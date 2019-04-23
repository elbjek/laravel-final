<template>
    <div>
        <h1>All Appointments of mine</h1>
            <div v-for="item in appointments" :key="item.id">
                <div v-for="appointment in item" :key="appointment.id">
                <p>Title : {{appointment.title}}</p>
                <p>Pet name : {{appointment.name}}</p>

                </div>
            </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                'appointments': []
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
