<template>
    <div class="col-md-6">
        <my-popup v-model:show = "this.CreateElementVisible">
            <create-category  />
        </my-popup>
        <a href="#" @click.prevent="showCreate">Создать новую категорию</a>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">id</th>
                        <th>Название категории</th>
                        <th>Дата создания</th>
                        <th style="width: 40px">Действия</th>
                    </tr>
                    </thead>
                    <tbody v-for="category in categories">
                    <tr :class="showEdit(category.id) ? 'd-none' : ''">
                        <td>{{ category.id }}</td>
                        <td>{{ category.title }}</td>
                        <td>{{ category.created_at }}</td>
                        <td>
                            <my-popup v-model:show="this.EditElementVisible">
                                <show-category :category="categorySelect"  @show="hidenDialog" @remove="deleteCategory"/>
                            </my-popup>
                            <a href="#" @click.prevent="ShowDialog(category)">Показать</a>
                            <a href="#" @click.prevent="changeEditCategoryId(category.id)">Изменить</a>
                            <a href="#" @click.prevent="deleteCategory(category.id)">Удалить</a>
                        </td>
                    </tr>

                    <tr :class="showEdit(category.id) ? '' : 'd-none'">
                        <td>{{ category.id }}</td>
                        <td>
                            <my-input :placeholder="category.title" v-model="newTitle"/>
                        </td>
                        <td>{{ category.created_at }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="#"
                                   @click.prevent="editCategory(category.id, true, newTitle)">OK</a>
                                <a href="#" @click.prevent="editCategory(category.id, false, newTitle)">NeOK</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
</template>

<script>

export default {
    name: "MyCategoryGrid",
    props: {
        categories: {
            type: Object,
            default: () => [],
        },
    },
        data() {
            return {
                newTitle: null,
                show: false,
                targetCategory: null,
                categorySelect: null,
                CreateElementVisible: false,
                EditElementVisible: false,
            }
        },
        methods: {
            showCreate() {
                this.CreateElementVisible = true
            },
            changeEditCategoryId(id) {
                this.targetCategory = id
            },
            showEdit(id) {
                return this.targetCategory === id
            },
            ShowDialog(category) {
                this.EditElementVisible = true
                this.categorySelect = category

            },
            hidenDialog(){
                this.EditElementVisible = false
            },
            deleteCategory(id) {

                 this.$emit('remove', id)

            },
            editCategory(id, edit, newTitle) {
                if (edit) {
                     this.$emit('update', id, newTitle)
                }
                this.targetCategory = null
                this.newTitle = null
            },

        },


}
</script>

<style scoped>

</style>
