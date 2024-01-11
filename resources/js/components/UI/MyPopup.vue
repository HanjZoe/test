<template>
    <div class="dialog" v-if="show" >
        <div  @click.stop class="dialog__content">
            <div class = "close_dialog_btm" @click="hideDialog">X</div>
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
    name: "MyPopup",
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        element: {
            Type: Array,
            default: () => [],
        }
    },
    methods: {
        hideDialog() {
            this.$emit('update:show', false)
        }
    }
}
</script>
<style scoped>
.dialog {
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
    position: fixed;
    display: flex;
    z-index: 9999;
}
.dialog__content {
    margin: auto;
    background: white;
    border-radius: 12px;
    min-height: 50px;
    min-width: 300px;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
}
.close_dialog_btm{
    width: 15px;
    position: relative;
    left: 94%;
    color: #4b4a45;
}
</style>
