<template>
<div class="appointments">
    <h2>Single Client</h2>
        <div class="card-body">
            <h5 class="card-title">Client name:{{client.client_name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Lastname:{{client.client_lastname}}</h6>
            <p class="card-text">{{client.phone_number}}</p>
            <p class="card-text">Email: {{client.email}}</p>
            <a v-bind:href="client.id+'/edit'" class="btn btn-edit">Edit</a>
            <a href="/clients" style="float:right"  class="btn btn-secondary">Back</a>
        </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
                'client': [],
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
                        this.client = response.data;
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
