<template>
    <div>
        <h1>All My Appointments</h1>
        <br>
        <a  class="btn btn-primary" href="/appointments/create">Add new</a>
        <div v-for="item in appointments" :key="item.id" class="card" style="width: 18rem;">
        <div class="card-body" v-for="appointment in item" :key="appointment.id">
            <h5 class="card-title">Title : {{appointment.title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Pet name : {{appointment.name}}</h6>
            <p class="card-text">Client name: {{appointment.client_name}}</p>
            <p class="card-text">Description: {{appointment.description}}</p>
            <p class="card-text">Time: {{appointment.created_at}}</p>
            <a :href="'/appointments/' + appointment.id" class="card-link">See more</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                'appointments': [],
                
            }
        },
        mounted() {
            console.log("i work");
            this.fetchAppointments();

            // Echo.channel('notifications')
            //     .listen("SongSavedEvent", (e) => {
            //         this.fetchSongs();
            //     });
        },

        methods: {
            fetchAppointments() {

                axios.get('/api/appointments')
                    .then(response => {
                        this.appointments = response.data;
                        console.log(this.appointments)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
