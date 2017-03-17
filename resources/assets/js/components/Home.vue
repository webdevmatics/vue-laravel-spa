<template>
    <div class="container">
        <div class="row pull-right">
            <router-link to="/create">
                <a class="btn btn-primary">Create Notebook</a>
            </router-link>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div v-if="loading">Loading...</div>
                <div class="panel panel-default" v-for='notebook in notebooks'>
                    <div @click="deleteIt(notebook.id)" class="btn pull-right"><i class="fa fa-times"></i></div>
                    <div @click="editIt(notebook.id)" class="btn pull-right"><i class="fa fa-pencil"></i></div>
                    <form @submit.prevent="updateIt(notebook.id)">
                        <div class="panel-heading">
                            <strong v-show="!showIt(notebook.id)">{{notebook.name}}</strong>
                            <input style="width:200px" v-show="showIt(notebook.id)" type="text" class="form-control"
                                   v-model="notebookEditData.name">
                        </div>

                        <div class="panel-body">
                            <span v-show="!showIt(notebook.id)">{{notebook.body}}</span>
                            <input v-show="showIt(notebook.id)" type="text" class="form-control"
                                   v-model="notebookEditData.body">

                            -by {{notebook.user.name}}
                        </div>

                        <button class="btn btn-primary" type="submit" v-show="showIt(notebook.id)">Ok</button>
                        <button class="btn btn-default" @click.prevent="editForm=false" v-show="showIt(notebook.id)">
                            Cancel
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notebooks: [],
                loading: false,
                editForm: "",
                notebookEditData: {name: '', body: ''},
                token: localStorage.getItem('token')
            }
        },
        methods: {
            editIt(notebookId){
                this.notebooks.forEach((notebook, i) => {
                    if (notebook.id == notebookId) {
                        this.notebookEditData = notebook;
                    }
                });

                return this.editForm = notebookId;
            },
            showIt(notebookId){
                if (this.editForm == notebookId) {
                    return true;
                }
                return false;
            },
            updateIt(notebookId){
                axios.put('/notebook/' + notebookId, this.notebookEditData)
                    .then(response => {
                        console.log(response);
                        this.editForm = false;
                        this.notebookEditData = "";
                        this.$router.push('/');
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
            },
            deleteIt(notebookId){
                let ok = confirm("are you sure?");
                if (ok) {
                    axios.delete('/notebook/' + notebookId).then(response => {
                        console.log(response);
                        this.fetchIt();
                    });
                }
            },
            fetchIt(){
                this.loading = true;
                axios.get('notebook?token=' + this.token).then((response) => {
                    this.notebooks = response.data;
                    this.loading = false
                });
            }
        },
        mounted() {
            console.log(this.token);
            this.fetchIt();

        }
    }
</script>
