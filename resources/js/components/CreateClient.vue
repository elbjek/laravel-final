<template>
    <div>
        <div style="display:flex; flex-direction:row; justify-content:space-between">
            <h2>Create Client</h2>
            <a class="btn btn-secondary" href="/appointments/" >Back to Dashboard</a>
        </div>
            <form @submit.prevent="formSubmit()" method="POST" action="/api/clients">
        <div class="form-group">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" name="client_name" v-model="fields.client_name"/>
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" name="client_lastname" v-model="fields.client_lastname"/>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" v-model="fields.email"/>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone number</label>
            <input type="number" class="form-control" name="phone_number" v-model="fields.phone_number"/>
        </div>
        <div class="form-group">
            <label for="pet_id">Pet</label>
            <select type="number" class="form-control" name="pet_id" v-model="fields.pet_id" >
            <option v-for="(name,id) in pets" :key="id" :value="id" > {{name}}</option>
            </select> 
        </div>
        <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden"  class="form-control"  name="user_id" :value="userid"/>
        </div>
    <div class="buttons" style="display:flex; flex-direction:row; justify-content:space-between" >
        <a class="btn btn-secondary" role="button" href="/pets/create">Add new pet</a>
        <a class="btn btn-primary" @click="formSubmit" href="/appointments/create" >Add</a>
    </div>
    </form>
    </div>
</template>

<script>
    export default {
        name: "CreateAppointment",
        data: function() {
            return {
                pets:'',
                userid:'',
                fields:{},
                errors:{}
            }
        },
        mounted() {
            console.log("i work");
            this.fetchData();
        },
        methods:{
            addUserId(){
                
            },
            fetchData:function () {
                axios.get('/api/clients/create')
                    .then(response => {
                        this.pets = response.data.pets
                        this.userid = response.data.user;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                console.log(this.userid)
                axios.post('/api/clients/', this.fields)
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
