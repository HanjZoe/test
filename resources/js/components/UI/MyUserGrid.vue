<template>
    <div class="col-md-6">


        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">

                <a href="#" @click.prevent="">Создать новую категорию</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">id</th>
                        <th>Имя пользователя</th>
                        <th>Email</th>
                        <th>Дата создания</th>
                        <th style="width: 40px">Действия</th>
                    </tr>
                    </thead>
                    <tbody v-for="user in users">
                    <tr :class="showEdit(user.id) ? 'd-none' : ''">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <my-popup v-model:show = "CreatePostVisible"><show-user :user="userSelect" @remove ="deleteUser(id)"  @show = "hidenDialog" /></my-popup>
                            <a href="#" @click.prevent="ShowDialog(user)">Показать</a>
                            <a href="#" @click.prevent="changeEditUserId(user.id,user.role)">Изменить</a>
                            <a href="#" @click.prevent="deleteUser(user.id)">Удалить</a>
                        </td>
                    </tr>

                    <tr :class="showEdit(user.id) ? '' : 'd-none'">
                        <td>{{ user.id }}</td>
                        <td>
                            <my-input :placeholder="user.name" v-model="newName"/>
                        </td>
                        <td>
                            <my-input :placeholder="user.email" v-model="newEmail"/>
                        </td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <select v-model="selectedRole">
                                <option v-for="(rl,id) in roles " :key="id" :value="id"
                                        >{{ rl }}
                                </option>
                            </select>
                            <div class="d-flex justify-content-between">
                                <a href="#" @click.prevent="editUser(user.id, true, newName, newEmail, selectedRole)">OK</a>
                                <a href="#" @click.prevent="editUser(user.id, false,newName, newEmail, selectedRole)">NeOK</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</template>

<script>

import ShowUser from "../Pages/Admin/Users/ShowUser";
import MyPopup from "./MyPopup";
export default {
    components: {MyPopup, ShowUser},
    props: {
        users: null,
        roles: null,

    },
    data() {
        return {
            newName: null,
            newEmail: null,
            show: false,
            targetUser: null,
            selectedRole: null,
            CreatePostVisible: false,
            userSelect:null,

        }
    },
    mounted() {

    },
    methods: {
        editUser(id, edit, newName, newEmail,selectedRole) {
            if(edit){
                 this.$emit('update', id, newName, newEmail,selectedRole)
            }
            this.targetUser = null
            this.newName = null
            this.newEmail = null

        },
        changeEditUserId(id, role) {
            this.selectedRole = role
            this.targetUser = id
        },
        showEdit(id) {
            return this.targetUser === id
        },
        ShowDialog(user){
            this.CreatePostVisible = true
            this.userSelect = user

        },
        hidenDialog(){
            this.CreatePostVisible = false
        },
        deleteUser(id){
            this.$emit('remove', id)
        }
    },
    name: "MyUserGrid"
}


</script>

<style scoped>

</style>
