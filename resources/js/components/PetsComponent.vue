<template>
    <div class="appointments">
            <div class="header">
                <h1>All My Pets</h1>
                <a class="btn btn-add" href="/pets  /create">Add new</a>
            </div>
        <div class="card-body" v-for="pet in pets" :key="pet.id">
            <h5 class="card-title">Pet name : {{pet.name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Weight : {{pet.weight}}</h6>
            <p class="card-text">Created: {{pet.created_at}}</p>
            <a :href="'/pets/' + pet.id" role="button" class="btn btn-secondary">View</a>
            <a :href="'/pets/' + pet.id + '/edit'" role="button" class="btn btn-edit">Edit</a>
            <button class="btn btn-rmv" @click.prevent="deleteItem(pet.id)">x</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                'pets': []   
            }
        },
        mounted() {
            console.log("i work");
            this.fetchPets();
        },

        methods: {
            fetchPets() {

                axios.get('/api/pets')
                    .then(response => {
                        this.pets = response.data;
                        console.log(this.pets)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            deleteItem($id){
                axios.delete('/api/clients/'+$id)
                .then(response=>{
                    this.pets.splice(this.pets.indexOf(this.pets.id), 1)
                })
            }
        }
    }
</script>
