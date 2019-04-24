<template>
<div class="appointments">
    <h2>Edit Appointment</h2>
        <form @submit.prevent="formSubmit()" method="POST" action="/api/appointments">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" :placeholder="appointment.title" name="title" v-model="fields.title"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" :placeholder="appointment.description" v-model="fields.description"/>
        </div>
        <div class="form-group">
            <label for="pet_id">Pet</label>
            <select  type="number" class="form-control" name="pet_id" v-model="fields.pet_id" >
            <option 
            v-for="(value, key) in pets" :value="key" :key="key"> 
                {{value}}
            </option>
            </select> 
        </div>
        <div class="form-group">
            <label for="client_id">Client id</label>
            <select type="number" class="form-control" name="client_id" v-model="fields.client_id">
            <option v-for="(value,key) in clients" :key="key" :value="key"> {{value}}</option>
            </select> 
        </div>
        <div class="form-group">
            <input type="hidden"  class="form-control"  name="user_id" value="userid"/>
        </div>
        <button type="submit" class="btn bnt-edt">Edit</button>
         <a class="btn btn-secondary" href="/appointments" role="button">Back</a> 
    </form>
</div>
</template>

<script>
    export default {
        name: "CreateAppointment",
        data: function() {
            return {
                pets:'',
                clients:'',
                userid:'',
                appointment:'',
                fields:{},
                currentPath: window.location.pathname,
                errors:{}
            }
        },
        mounted() {
            console.log("i work");
            this.fetchData();
            // Echo.channel('notifications')
            //     .listen("SongSavedEvent", (e) => {
            //         this.fetchSongs();
            //     });
        },
        methods:{
            addUserId(){
                console.log(this.fields)
            },
            fetchData:function () {
                axios.get('/api' + this.currentPath)
                    .then(response => {
                        this.userid = response.data.user;
                        this.pets = response.data.pets;
                        this.clients = response.data.clients;
                        this.appointment = response.data.appointment;
                        console.log(this.pets);
                        console.log(this.appointment)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                this.addUserId()
                axios.put('/api/appointments/'+this.appointment.id, this.fields).then(response => {
                alert('Message sent!');
                })
                .catch(error => {
                    if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                    }
                });
            }
        }
}
</script>

<style scoped>

</style>
