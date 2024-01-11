<template>
    <div>
    <title>Название категории</title>
    <my-input :placeholder="placeholder" v-model="newTitle"/>
        <div class="btn">
    <button  @click.prevent="">ОК</button>
            </div>
    </div>
</template>

<script>

export default {
    name: "CreateCategory",
    data() {
        return {
            placeholder: 'Название категории',
            newTitle: null,
        }
    }
}
</script>

<style scoped>
.btn{
    position: relative;
    left: 80%;
}
</style>
