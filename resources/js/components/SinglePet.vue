<template>
<div class="appointments">
    <h2>Single Pet</h2>
        <div class="card-body">
            <h5 class="card-title">Pet name:{{pet.name}}</h5>
            <p>Weight:{{pet.weight}}</p>
            <a v-bind:href="pet.id+'/edit'" class="btn btn-edit">Edit</a>
            <a href="/pets" class="btn btn-secondary" style="float:right">Back</a>
        </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
                'pet': [],
                'currentPath' : window.location.pathname
            }
        },
        mounted() {

            this.fetchClients();
        },

        methods: {
            fetchClients() {
                axios.get('/api' + this.currentPath)
                    .then(response => {
                        this.pet = response.data;
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
