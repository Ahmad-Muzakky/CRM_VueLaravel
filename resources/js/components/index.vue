<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <form
                    class="d-flex float-start"
                    role="search"
                    @submit.prevent="submitSearch()"
                >
                    <input
                        class="form-control me-2"
                        type="search"
                        placeholder="Search Position"
                        v-model="cari"
                    />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
                <strong>Table List Employee</strong>
                <router-link
                    class="btn btn-primary round float-end"
                    :to="'/create/employe'"
                >
                    Tambah Employe
                </router-link>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="value in items.data.data" :key="value.id">
                            <td>{{ value.name }}</td>
                            <td>{{ value.job }}</td>
                            <td>
                                <router-link
                                    class="btn btn-warning"
                                    :to="`/employe/edit/`+value.id"
                                >
                                    Edit
                                </router-link>
                                |
                                <button type="button" class="btn btn-danger" @click="deleteEmploye(value.id)">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <button
                                type="button"
                                class="page-link"
                                @click="prevPage()"
                            >
                                Previous
                            </button>
                        </li>
                        <li
                            class="page-item"
                            v-for="index in items.total_halaman"
                            :key="index"
                        >
                            <button
                                type="button"
                                class="page-link"
                                @click="currPage(index)"
                            >
                                {{ index }}
                            </button>
                        </li>
                        <li class="page-item">
                            <button
                                type="button"
                                class="page-link"
                                @click="nextPage()"
                            >
                                Next
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [],
            halaman: 1,
            cari: "",
            position: [],
        };
    },
    mounted() {
        this.fetchApi("http://127.0.0.1:8000/api/employee");
        this.fetchApiPosition("http://127.0.0.1:8000/api/position");
    },
    methods: {
        prevPage: function () {
            if (this.halaman > 1) {
                this.halaman = this.halaman - 1;
                this.fetchApi(
                    `http://127.0.0.1:8000/api/employee?halaman=` + this.halaman +`&cari=` + this.cari
                );
            }
        },
        nextPage: function () {
            if (this.halaman != this.items.total_halaman) {
                this.halaman = this.halaman + 1;
                this.fetchApi(
                    `http://127.0.0.1:8000/api/employee?halaman=` + this.halaman +`&cari=` + this.cari
                );
            }
        },
        currPage: function (x) {
            this.halaman = x;
            this.fetchApi(
                `http://127.0.0.1:8000/api/employee?halaman=` + this.halaman +`&cari=` + this.cari
            );
        },
        fetchApi: function (url) {
            axios
                .get(url)
                .then((response) => {
                    this.items = response.data;
                })
                .catch((error) => {
                    console.log(response.status);
                });
        },
        submitSearch:function(){
            this.halaman = 1
            this.fetchApi(
                `http://127.0.0.1:8000/api/employee?halaman=` + this.halaman +`&cari=` + this.cari
            );
        },
        deleteEmploye(str){
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
                        axios.delete(`http://127.0.0.1:8000/api/employee/`+str)
                            .then((response) => {
                                console.log(response);
                                this.$swal.fire(
                                    "deleted",
                                    "your file has been deleted",
                                    "success"
                                );
                                this.fetchApi("http://127.0.0.1:8000/api/employee");
                            });
                    }
                });
        }
    },
};
</script>

<style></style>
