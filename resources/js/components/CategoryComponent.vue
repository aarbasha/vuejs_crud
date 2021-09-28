<template>
    <div class="container">
        <div class="row justify-content-center p-0 m-0">
            <div class="col-lg-12">
                <form>
                    <div class="form-group">
                        <label for="">Categyre Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            v-model="name"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label for="">Enter Info Categoure</label>
                        <textarea
                            name="info"
                            v-model="info"
                            id="info"
                            cols="30"
                            rows="4"
                            type="text"
                            class="form-control"
                            required
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        @click.prevent="saveCategory"
                        class="btn btn-primary"
                    >
                        Save
                    </button>
                </form>
            </div>

            <div class="col-lg-12 mt-2 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">info</th>
                            <th scope="col">opritions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(Category, index) in Categorys.data"
                            :key="Category.id"
                        >
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ Category.name }}</td>
                            <td>{{ Category.info }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#edit"
                                    @click="editCategory(Category.id)"
                                >
                                    Edit
                                </button>

                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    data-toggle="modal"
                                    data-target="#delete"
                                >
                                    Delete
                                </button>

                                <!-- Button trigger modal -->

                                <!-- Modal Edit -->
                                <div
                                    class="modal fade"
                                    id="edit"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="edit"
                                    aria-hidden="true"
                                >
                                    <div
                                        class="modal-dialog modal-lg"
                                        role="document"
                                    >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5
                                                    class="modal-title"
                                                    id="edit"
                                                >
                                                    Edit Category
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close"
                                                >
                                                    <span aria-hidden="true"
                                                        >&times;</span
                                                    >
                                                </button>
                                            </div>
                                            <form>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="name"
                                                            name="name"
                                                            v-model="editName"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea
                                                            name="info"
                                                            v-model="editInfo"
                                                            id="info"
                                                            cols="30"
                                                            rows="4"
                                                            type="text"
                                                            class="form-control"
                                                        ></textarea>
                                                    </div>
                                                </div>
                                                <div
                                                    class="modal-footer d-flex justify-content-center"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger"
                                                        data-dismiss="modal"
                                                    >
                                                        Close
                                                    </button>
                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary"
                                                        data-dismiss="modal"
                                                        @click.prevent="
                                                            updateCategory
                                                        "
                                                    >
                                                        Save changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal delete -->
                                <div
                                    class="modal fade"
                                    id="delete"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="delete"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5
                                                    class="modal-title"
                                                    id="exampleModalLabel"
                                                >
                                                    delete Category
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close"
                                                >
                                                    <span aria-hidden="true"
                                                        >&times;</span
                                                    >
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>
                                                    {{ name }}: هل تريد حذف
                                                    المحتوى
                                                </h3>
                                                <br />
                                            </div>
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    class="btn btn-danger"
                                                    data-dismiss="modal"
                                                >
                                                    Close
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="btn btn-dark"
                                                    data-dismiss="modal"
                                                    @click="
                                                        deleteCategory(
                                                            Category.id
                                                        )
                                                    "
                                                >
                                                    yes delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <pagination
                    :data="Categorys"
                    @pagination-change-page="getResults"
                ></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            Categorys: {},
            id: "",
            name: "",
            info: "",
            editName: "",
            editInfo: "",
            deleteName: ""
        };
    },
    mounted() {
        this.getResults();
    },
    methods: {
        saveCategory() {
            axios
                .post("save-category", {
                    name: this.name,
                    info: this.info
                })
                .then(Response => {
                    this.name = "";
                    this.info = "";
                    this.getResults();
                });
        },
        editCategory(id) {
            // alert(id)
            axios.get("edit_category/" + id).then(response => {
                console.log(response);
                this.id = response.data.id;
                this.editName = response.data.name;
                this.editInfo = response.data.info;
                this.getResults();
            });
        },
        updateCategory() {
            //   alert('success')
            axios
                .put("update_category", {
                    id: this.id,
                    name: this.editName,
                    info: this.editInfo
                })
                .then(response => {
                    this.getResults();
                });
        },
        deleteCategory(id) {
            axios.delete("delete_category/" + id).then(response => {
                this.getResults();
            });
        },
        getResults(page = 1) {
            axios.get("all_category?page=" + page).then(response => {
                // console.log(response.data);
                this.Categorys = response.data;
            });
        }
    }
};
</script>
