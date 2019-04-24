<template>
    <div class="appointments">
            <div class="header">
                <h1>All My Appointments</h1>
                <a class="btn btn-add" href="/appointments/create">Add new</a>
            </div>
           <div class="row">
                <div class="card-body" v-for="(appointment,key) in appointments" :key="key">               
                    <h3 class="card-title">Title : <span>{{appointment.title}}</span> </h3>
                    <h6 class="card-subtitle mb-2 text-muted">Pet name : <span>{{appointment.name}}</span></h6>
                    <p class="card-text">Description: <span>{{appointment.description}}</span></p>
                    <p class="card-text">Time: <span>{{appointment.created_at}}</span></p>
                    <a :href="'/appointments/' + appointment.id" class="card-link">See more</a>
                <button class="btn btn-danger" @click.prevent="deleteItem(appointment.id)">Delete</button>
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
