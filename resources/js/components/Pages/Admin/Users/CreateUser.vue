<template>
    <div>
        <title>Название категории</title>
        <my-input placeholder="Имя пользователя"/>
        <my-input placeholder="Адресс электронной почты"/>
        <my-input placeholder="Пароль"/>
        <my-input placeholder="Подтвердите пароль"/>
        <div class="btn">
            <button  @click.prevent="">ОК</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateUser"
}
</script>

<style scoped>

</style>
