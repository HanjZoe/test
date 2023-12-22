<template>
    <div>

        <h2>Юзер {{ user.name }}</h2>
        <a href="#" @click.prevent="deleteClikc(user.id)">Удалить</a>
    </div>
    <div>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Дата создания</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.created_at }}</td>

            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "ShowUser",
    props: {
        user: {
            Type: Array,
            default: () => [],
        }


    },
    emits: ['remove', 'show'],
    methods:{
     deleteClikc(id){
         this.$emit('remove', id)
         this.$emit('show')
     }
    }

}
</script>

<style scoped>

</style>
