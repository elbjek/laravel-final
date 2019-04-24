<template>
<div>
    <h2>Single Appointment Here</h2>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Title:{{appointment.title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Description:{{appointment.description}}</h6>
            <p class="card-text">Lorem ipsum</p>
            <p class="card-text">Client: {{appointment.client_name}}</p>
            <a  v-bind:href="appointment.id+'/edit'">Edit</a>
            <a href="/appointments" class="card-link">Back</a>
        </div>
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
