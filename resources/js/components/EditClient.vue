<template>
<div>
    <div style="display:flex; flex-direction:row; justify-content:space-between">
        <h3>Edit Client</h3>
        <a class="btn btn-secondary" href="/clients" role="button">Back</a> 
    </div>
        <form  method="POST" action="/api/clients">
        <div class="form-group">
            <label for="title">First name:</label>
            <input type="text" class="form-control"  name="client_name" :placeholder="client.client_name" v-model="fields.client_name"/>
        </div>
        <div class="form-group">
            <label for="description">Last name:</label>
            <input type="text" class="form-control" name="client_lastname" :placeholder="client.client_lastname"  v-model="fields.client_lastname"/>
        </div>
        <div class="form-group">
            <label for="description">Email</label>
            <input type="text" class="form-control" name="email" :placeholder="client.email" v-model="fields.email"/>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone number</label>
            <input type="text" class="form-control" name="phone_number" :placeholder="client.phone_number" v-model="fields.phone_number"/>
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
            <input type="hidden" class="form-control"  name="user_id" value="userid"/>
        </div>
        <div class="buttons" style="display:flex; flex-direction:row; justify-content:space-between" >
        <a class="btn btn-secondary" href="/pets/create" role="button">Create pet</a> 
        <a class="btn btn-primary" @click="formSubmit" href="/clients">Add</a>
        </div>
      

    </form>
</div>
</template>

<script>
    export default {
        name: "EditClient",
        data: function() {
            return {
                pets:'',
                client:'',
                userid:'',
                fields:{},
                currentPath: window.location.pathname,
                errors:{}
            }
        },
        mounted() {
            this.fetchData();
        },
        methods:{
            fetchData:function () {
                axios.get('/api' + this.currentPath)
                    .then(response => {
                        this.userid = response.data.user;
                        this.pets = response.data.pets;
                        this.client = response.data.client;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                axios.put('/api/clients/'+this.client.id, this.fields)
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
