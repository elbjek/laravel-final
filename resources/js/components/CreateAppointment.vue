<template>
    <form >
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" v-model="title"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" v-model="description"/>
        </div>
        <div class="form-group">
            <label for="pet_id">Pet id</label>
            <input type="number" class="form-control" name="pet_id" v-model="pet_id"/>
        </div>
        <div class="form-group">
            <label for="client_id">Client id</label>
            <input type="number" class="form-control" name="client_id" v-model="client_id"/>
        </div>
        <div class="form-group">
            <label for="user_id">User Id</label>
            <input type="hidden"  value="1" class="form-control" name="user_id" v-model="user_id"/>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</template>

<script>
    export default {
        name: "CreateAppointment",
        data: function() {
            return {
                title:'',
                description:'',
                pet_id:'',
                client_id:'',
                user_id:''
            }
        },
        methods:{
            createAppointment:function (e) {
                e.preventDefault();
                console.log(this.title)
                axios.post('/api/appointments')
                    .then(response => {
                        this.appointments = response.data;
                        console.log(this.appointments)
                    })
                    .catch((err) => {
                        console.log(err)
                    })

            }
        }
    }
</script>

<style scoped>

</style>
