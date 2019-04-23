<template>
    <div>
        <h1>All My Clients</h1>
        <br>

        <div class="card-body" v-for="client in clients" :key="client.id">
            <h5 class="card-title">Client name : {{client.client_name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Client lastname : {{client.client_lastname}}</h6>
            <p class="card-text">Email: {{client.email}}</p>
            <a :href="'/clients/' + client.id" class="card-link">See more</a>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                'clients': []   
            }
        },
        mounted() {
            console.log("i work");
            this.fetchClients();

            // Echo.channel('notifications')
            //     .listen("SongSavedEvent", (e) => {
            //         this.fetchSongs();
            //     });
        },

        methods: {
            fetchClients() {

                axios.get('/api/clients')
                    .then(response => {
                        this.clients = response.data;
                        console.log(this.clients)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
