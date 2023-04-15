<template>
  <div class="container">
    <div class="card">
        <div class="card-header">
            Create Employee
        </div>
        <div class="card-boyd">
            <form @submit.prevent="submitData()">
                <div class="mb-3">
                    <label for="first_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="first_name" v-model="data.name" >
                </div>
                <div class="mb-3">
                    
                    <select name="selected" id="selected" v-model="data.id">
                        <option value="" selected disabled>Choose Position</option>
                        <option  v-for="item in items"  :key="item.id" :value="item.id">{{ item.job }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <router-link class="btn btn-danger btn-sm" to="/">Cancel</router-link>
                </div>
            </form>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            data:{
                name: '',
                id: '',
            },
            items :[]
        }
    },
    mounted(){
        this.fetchApi();
        console.log("haa" + this.items);
    },
    methods:{
        fetchApi:function (){
            axios.get("http://127.0.0.1:8000/api/position").then((response) => {
                    this.items = response.data.data;
                })
                .catch((error) => {
                    console.log(response.status);
                });
        },
        submitData:function(){
            console.log(this.data);
            axios.post('http://127.0.0.1:8000/api/employee',this.data).then((res)=>{
                this.$router.push('/');
                this.$swal.fire({
                    icon: 'success',
                    title: 'save data success!',
                    showConfirmButton : false,
                    timer: 1500
                }).catch((error)=>{
                    console.log("gagal menambahkan");
                })
            })
        }
    }
}
</script>

<style>

</style>