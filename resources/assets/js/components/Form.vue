<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               
                <form @submit.prevent="addNotebook">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name of notebook" v-model="notebookData.name">
                        <span class="text-danger">{{errors.name?errors.name[0]:""}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Body</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" v-model="notebookData.body">
                        <span class="text-danger">{{errors.body?errors.body[0]:""}}</span>

                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            notebookData:{ 
                name:'',
                body:''
            },

            errors:{}

            }
           
        },
        methods:{
            addNotebook(){
                axios.post('/notebook',this.notebookData)
                .then(response=>{
                    this.notebookData="";
                    this.errors="";
                    this.$router.push('/');
                })
                .catch(error=>{
                    this.errors=error.response.data;
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
