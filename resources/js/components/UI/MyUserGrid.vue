<template>
    <div class="col-md-6">


        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
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
                    <tr>
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <a href="#" @click.prevent="getLol(1)">Показать</a>
                            <a href="#" @click.prevent="getLol(2)">Изменить</a>
                            <a href="#" @click.prevent="$emit('remove', user.id)">Удалить</a>
                        </td>
                        </tr>
                        <tr>
                        <td>{{ user.id }}</td>
                            <td>
                                <my-input :placeholder="user.name" v-model = "newName"/>
                            </td>
                        <td><my-input :placeholder="user.email" v-model = "newEmail"/></td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <select >
                                <option v-for = "(rl,id) in roles " :key="id" :value="id" :selected="user.role == id ? true : false" >{{rl}}</option>
                            </select>
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
import MyInput from "./MyInput";
export default {
    components: {MyInput},
    props: {
        users: null,
        roles:null
    },
    data(){
      return{
          newName: null,
          newEmail: null,
      }
    },
    mounted() {

    },
    methods: {},
    name: "MyUserGrid"
}


</script>

<style scoped>

</style>
