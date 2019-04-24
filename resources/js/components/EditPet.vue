<template>
<div>
    <div style="display:flex; flex-direction:row; justify-content:space-between">
        <h3>Edit Pet</h3>
        <a class="btn btn-secondary" href="/pets" role="button">Back</a> 
    </div>
        <form  method="POST" action="/api/pets">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control"  name="name" :placeholder="pet.name" v-model="fields.name"/>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" class="form-control" name="weight" :placeholder="pet.weight"  v-model="fields.weight"/>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control"  name="user_id" :value="pet.user_id"/>
        </div>
        <div class="buttons" style="display:flex; flex-direction:row; justify-content:space-between" >
        <a class="btn btn-primary" @click="formSubmit" href="/pets">Add</a>
        </div>
    </form>
</div>
</template>

<script>
    export default {
        name: "EditPet",
        data: function() {
            return {
                pet:'',
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
                console.log(this.currentPath);
                axios.get('/api' + this.currentPath)
                    .then(response => {
                        this.pet = response.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                axios.put('/api/pets/'+this.pet.id, this.fields)
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
