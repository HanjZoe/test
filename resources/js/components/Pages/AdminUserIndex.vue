<template>
<div>
    <my-nav-bar></my-nav-bar>
    <div class="content-wrapper">
        <my-user-grid
            :users="users"
            :roles="roles"
            @remove="deleteUser"
            ></my-user-grid>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            users: null,
            roles:null,
        }
    },
    mounted(){
        this.getUsers()
    },
   methods:{
       getUsers(){
           axios.get('/api/vue/admin/users/')
               .then(data => {
                   data.data.users.forEach((element) => {
                       element.created_at = new Date(element.created_at).toLocaleString();
                   });
                    this.users = data.data.users;
                    this.roles = data.data.roles
               })
               .catch(function (){
                   console.log('sdsddsd')
       })
       },
       deleteUser(user){
         axios.delete(`/api/vue/admin/users/${user}`)
           .then(data =>{
                this.getUsers()
               console.log(data)
           })
           .catch()
       },
   }

}
</script>

<style scoped>

</style>
