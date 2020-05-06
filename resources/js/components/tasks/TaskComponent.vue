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
                tasks: []
            }
        },
        mounted() {
            this.ListTask();
        },
        methods: {
            ListTask(){
                axios.get('/tasks').then((response)=>{
                    this.tasks = response.data;
                });
            },
            addTask(task){
                this.tasks.push(task);
            },
            updateTask(index, task){
                this.tasks[index] = task;
            },
            deleteTask(index){
                this.tasks.splice(index, 1);
            }
            /** 
            intervalFetchData(){
                setInterval(()=>{
                    this.ListTask();
                }, 1000);
            }
            */
        }
    }
</script>
