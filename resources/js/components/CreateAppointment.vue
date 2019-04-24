<template>
    <form @submit.prevent="formSubmit()" method="POST" action="/api/appointments">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" v-model="fields.title"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" v-model="fields.description"/>
        </div>
        <!-- <div class="form-group">
            <label for="pet_id">Pet id</label>
            <input type="number" class="form-control" name="pet_id" v-model="fields.pet_id"/>
        </div> -->
                <!-- <div class="form-group">
            <label for="client_id">Client id</label>
            <input type="number" class="form-control" name="client_id" v-model="fields.client_id"/>
        </div> -->
        <div class="form-group">
            <label for="pet_id">Pet</label>
            <select type="number" class="form-control" name="pet_id" v-model="fields.pet_id" >
            <option v-for="(name,id) in pets" :key="id" :value="id" > {{name}}</option>
            </select> 
        </div>
        <div class="form-group">
            <label for="client_id">Client id</label>
            <select type="number" class="form-control" name="client_id" v-model="fields.client_id">
            <option v-for="(value,key) in clients" :key="key" :value="key"> {{value}}</option>
            </select> 
        </div>
        <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden"  class="form-control"  name="user_id" value="userid"/>
        </div>
        <button type="submit" class="btn btn-primary"><a href="/appointments">Add</a></button>
    </form>
</template>

<script>
    export default {
        name: "CreateAppointment",
        data: function() {
            return {
                pets:'',
                clients:'',
                userid:'',
                fields:{},
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
                axios.get('/api/appointments/create')
                    .then(response => {
                        this.userid = response.data.user;
                        this.pets = response.data.pets;
                        this.clients = response.data.clients;
                        console.log(this.pets);
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                this.addUserId()
                axios.post('/api/appointments/', this.fields)
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
