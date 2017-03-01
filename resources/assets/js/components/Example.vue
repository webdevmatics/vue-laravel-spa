<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div v-if="loading">Loading</div>
                <div class="panel panel-default" v-for='notebook in notebooks'>
                    <div class="panel-heading">{{notebook.name}} </div>

                    <div class="panel-body">
                        {{notebook.body}}
                        -by {{notebook.user.name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notebooks:[],
                loading:false
            }
        },
        mounted() {
            // var self=this;
            // axios.get('/notebook').then(function(response){
            //     self.notebooks=response.data;
            // });
            this.loading=true;
            axios.get('notebook').then((response)=>{this.notebooks=response.data; this.loading=false;});
        }
    }
</script>
