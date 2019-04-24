<template>
<div class="appointments">
    <h2>Single Appointment</h2>
        <div class="card-body">
            <h3 class="card-title">Title: <span>{{appointment.title}}</span></h3>
            <h6 class="card-subtitle mb-2 text-muted">Description: <span>{{appointment.description}}</span></h6>
            <p class="card-text">Client: <span>{{appointment.client_name}}</span></p>
            <a class="btn bnt-edt" v-bind:href="appointment.id+'/edit'">Edit</a>
            <a href="/appointments" class="btn btn-secondary" style="float:right">Back</a>
        </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
                'appointment': [],
                'currentPath' : window.location.pathname
            }
        },
        mounted() {
            this.fetchAppointment();
        },

        methods: {
            fetchAppointment() {
                axios.get('/api' + this.currentPath)
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
