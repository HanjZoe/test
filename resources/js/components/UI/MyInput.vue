<template>
    <input :value="modelValue" :placeholder="placeholder" @input="updateInput">
</template>

<script>
export default {
    name: "MyInput",
    props: {
        placeholder: String,
        modelValue: [String, Number]
    },
    methods: {
        updateInput(event) {
            this.$emit("update:modelValue", event.target.value);
        }
    },
};
</script>

<style scoped>
</style>
