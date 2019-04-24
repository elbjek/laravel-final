<template>
<div>
    <h2>Single Client</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Client name:{{pet.name}}</h5>
            <p>{{pet.weight}}</p>
            <a v-bind:href="pet.id+'/edit'">Edit</a>
            <a href="/pets" class="card-link">Back</a>
        </div>
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
