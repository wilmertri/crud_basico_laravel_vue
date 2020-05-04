<template>
    <div class="container">
        <div class="row justify-content-center">
            <add-task-component @add="addTask">
            </add-task-component>
            <list-task-component 
                v-for="(task, index) in tasks" 
                :key="task.id"
                :task="task"
                @update="updateTask(index, ...arguments)"
                @delete="deleteTask(index)">
            </list-task-component>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [{
                    id: 1,
                    name: 'Realizar app Laravel y Vue',
                    created_at: '25/04/2020'
                }]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addTask(task){
                let last_task = this.tasks[this.tasks.length - 1];
                task.id = last_task.id + 1;
                this.tasks.push(task);
            },
            updateTask(index, task){
                this.tasks[index] = task;
            },
            deleteTask(index){
                this.tasks.splice(index, 1);
            }
        }
    }
</script>
