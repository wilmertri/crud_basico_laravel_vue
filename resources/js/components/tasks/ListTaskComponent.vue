<template>
    <div class="col-md-10 mt-2">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                Tarea creada hace {{ task.created_at }}
            </div>

            <div class="card-body">
                <input v-if="editMode" type="text" class="form-control" v-model="task.name">
                <p v-else>{{ task.name }}</p>
            </div>

            <div class="card-footer">
                <div v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Guardar cambios</div>
                <div v-else class="btn btn-primary" v-on:click="onClickEdit()">Editar</div>
                <div class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['task'],
        data() {
            return {
                editMode: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete(){
                axios.delete(`/tasks/${this.task.id}`).then(()=>{
                    this.$emit('delete');
                });
            },
            onClickEdit(){
                this.editMode = true;
            },
            onClickUpdate(){
                const params = {
                    name: this.task.name
                };
                axios.put(`/tasks/${this.task.id}`,params).then((response)=>{
                    this.editMode = false;
                    const task = response.data;
                    this.$emit('update', task);
                });
            },
            
        }
    }
</script>