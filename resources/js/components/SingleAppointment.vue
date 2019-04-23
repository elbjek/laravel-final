<template>
    <div>
        <h1>mY Appointments</h1>
                <p>Title : {{appointment.title}}</p>
                <p>Pet name : {{appointment.name}}</p>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                'appointment': []
            }
        },
        mounted() {
            console.log("im here");
            this.fetchAppointments();

            // Echo.channel('notifications')
            //     .listen("SongSavedEvent", (e) => {
            //         this.fetchSongs();
            //     });
        },

        methods: {
            fetchAppointments() {
                var currentPath = window.location.pathname;
                axios.get('/api' + currentPath)
                    .then(response => {
                        this.appointment = response.data;
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
