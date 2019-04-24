<template>
    <div>
  <!-- v-for="(value,key,index) in clients" :key="`${index}-${client.id}`" :value="key"> {{client}} -->
        <h1>All My Appointments</h1>
        <br>
        <a class="btn btn-primary" href="/appointments/create">Add new</a>
            <div class="card-body" v-for="(appointment,key) in appointments" :key="key">               
                <h5 class="card-title">Title : {{appointment.title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Pet name : {{appointment.name}}</h6>
                <p class="card-text">Description: {{appointment.description}}</p>
                <p class="card-text">Time: {{appointment.created_at}}</p>
                <a :href="'/appointments/' + appointment.id" class="card-link">See more</a>
                <button class="btn btn-danger" @click.prevent="deleteItem(appointment.id)">Delete</button>
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
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            deleteItem($id){
                axios.delete('/api/appointments/'+$id)
                .then(response=>{
                    this.appointments.splice(this.appointments.indexOf(this.appointments.id), 1)
                })
            }
        }
    }
</script>
