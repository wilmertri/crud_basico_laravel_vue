<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Agrega una nueva tarea
            </div>
            <div class="card-body">
                <form action="" v-on:submit.prevent="addTask()" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Agregar</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addTask() {
                let task = {
                    id: 2,
                    name: this.name,
                    created_at: '30/04/2020'
                }
                this.$emit('add', task);
                this.name = '';
            }
        }
    }
</script>
