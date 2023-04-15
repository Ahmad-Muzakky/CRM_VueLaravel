<template>
  <div class="container">
    <div class="card">
        <div class="card-header">
            Create Position
        </div>
        <div class="card-boyd">
            <form @submit.prevent="submitData()">
                <div class="mb-3">
                    <label for="first_name" class="form-label">Position</label>
                    <input type="text" class="form-control" id="first_name" v-model="data.job" >
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
                job: '',
            }       
        }
    },
    methods:{
        submitData:function(){
            console.log(this.data);
            axios.post('http://127.0.0.1:8000/api/position',this.data).then((res)=>{
                this.$router.push('/position');
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