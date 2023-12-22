<template>
    <div>
        1111
    </div>
</template>

<script>

export default {
    name: "Category",

    data() {
        return {
            categories:{
                Type: Array,
                default: () => [],
            }
        }

    },
    mounted() {
        this.getCategory()
    },
    methods: {
        getCategory(){
            axios.get('/api/vue/admin/category/').then(data =>{
                console.log(data)
                }

            ).catch(

            )
        },
    },

}
</script>

<style scoped>

</style>
