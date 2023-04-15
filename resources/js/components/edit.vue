<template>
    <div class="container">
    <div class="card">
        <div class="card-header">
            Edit Employee
        </div>
        <div class="card-body">
            <form @submit.prevent="editData()">
                <div class="mb-3">
                    <label for="first_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="first_name" v-model="post.name" >
                </div>
                <div class="mb-3">
                    <P>Current Position : </P>
                    <select name="selected" id="selected" v-model="post.id_position">
                        <option  v-for="item in data"  :key="item.id" :value="item.id">{{ item.job }}</option>
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
            post:{
                name:'',
                id_position:''
            },
            data:[],
            id : this.$route.params.id
        }
    },
    mounted(){
        this.fetchApi();
        this.fetchApiPosition()
    },
    methods:{
        fetchApi:function(){
            axios.get(`http://127.0.0.1:8000/api/employee/`+this.id).then((response)=>{
                this.post.name = response.data.data.name
                this.post.id_position = response.data.data.id_position
            }).catch((error)=>{
                console.log('gagal mengambil');
            })
        },
        fetchApiPosition:function(){
            axios.get(`http://127.0.0.1:8000/api/position`).then((response)=>{
                this.data = response.data.data
            }).catch((error)=>{
                console.log('gagal mengambil');
            })
        },
        editData:function(){
            axios.put('http://127.0.0.1:8000/api/employee/'+ this.id,this.post).then((response)=>{
                this.$router.push('/');
                this.$swal.fire({
                    icon: 'success',
                    title: 'save data success!',
                    showConfirmButton : false,
                    timer: 1500
                })
            })
        }
    }
}
</script>

<style>

</style>