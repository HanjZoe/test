<template>
    <div>

        <h2>Категория {{ category.title }}</h2>
        <a href="#" @click.prevent="deleteClikc(category.id)">Удалить</a>
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
                <td>{{ category.id }}</td>
                <td>{{ category.title }}</td>
                <td>{{ category.created_at }}</td>

            </tr>
            </tbody>
        </table>

    </div>
</template>
<script>
export default {
    name: "ShowCategory",
    props: {
        category: {
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
