<template>
<div>

    <my-nav-bar></my-nav-bar>
    <div class="content-wrapper">
        <my-user-grid
            :users="users"
            :roles="roles"
            @remove= "deleteUser"
            @update = "updateUser"
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
       updateUser(id, newName, newEmail, newRole){
           console.log(id,newName,newEmail,newRole)
         axios.patch(`/api/vue/admin/users/${id}`,{name: newName, email: newEmail, role: newRole,user_id: id}).then(data => {
             console.log(data)
             this.getUsers()
         }).catch(function (e){
             console.log(e)
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
