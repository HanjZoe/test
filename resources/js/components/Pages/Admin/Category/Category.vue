<template>
    <div>
        <my-category-grid
            :categories = "this.categories"
        @remove = "deleteCategory"
        @update = "updateCategory"/>
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
            axios.get('/api/vue/admin/category').then(data =>{
                console.log(data)
                data.data.forEach((element) => {
                    element.created_at = new Date(element.created_at).toLocaleString();
                });
                this.categories = data.data
                }
            ).catch(function (e){
                console.log(e)
            })
        },
        updateCategory(id, newTitle){
            console.log(id,newTitle)
            axios.patch(`/api/vue/admin/category/${id}`,{title: newTitle})
                .then(data => {
                console.log(data)
                this.getCategory()
            }).catch(function (e){
                console.log(e)
            })
        },
        deleteCategory(category){
            axios.delete(`/api/vue/admin/category/${category}`)
                .then(data =>{
                    this.getCategory()
                })
                .catch(function (e){
                    console.log(e)
                })
        },

        storeCategory(title){
            axios.post(`/api/vue/admin/category`,{title: title})
                .then(data=>{
                    this.getCategory()
                })
                .catch(function (e){
                    console.log(e)
                })
        }
    },
}
</script>
<style scoped>
</style>
