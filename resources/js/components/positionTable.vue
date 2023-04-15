<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>List Position Table</h2>
                <router-link
                    class="btn btn-primary round float-end"
                    :to="'/create/position'"
                >
                    Tambah Position
                </router-link>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Position</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(value,index) in items"
                            :key="value.id"
                        >
                        <td>{{ ++index }}</td>
                            <td>{{ value.job }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    @click="deletePosition(value.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [],
        };
    },
    mounted() {
        this.fetchApi();
    },
    methods: {
        fetchApi:function (){
            axios.get("http://127.0.0.1:8000/api/position").then((response) => {
                    this.items = response.data.data;
                })
                .catch((error) => {
                    console.log(response.status);
                });
        },
        deletePosition(str){
            this.$swal
                .fire({
                    title: "are you sure?",
                    text: "You Wont Be able to revert this!",
                    icon: "warning",
                    showCancelbutton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "yes, delete it",
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`http://127.0.0.1:8000/api/position/`+str)
                            .then((response) => {
                                console.log(response);
                                this.$swal.fire(
                                    "deleted",
                                    "your file has been deleted",
                                    "success"
                                );
                                this.fetchApi();
                            });
                    }
                });
        }
    },
};
</script>

<style></style>
