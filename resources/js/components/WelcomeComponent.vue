<template>
    <div>
   All groomers
            <!-- <div v-for="user in users" :key="user.id">
                <p>Name : {{user.first_name}}</p>
                <p>Email : {{user.email}}</p>
            </div> -->
    </div>
</template>
<script>
    export default {
        data() {
            return {
                'users': []
            }
        },
        mounted() {
            console.log("i work");
            this.fetchUsers();

            // Echo.channel('notifications')
            //     .listen("SongSavedEvent", (e) => {
            //         this.fetchSongs();
            //     });
        },

        methods: {
            fetchUsers() {
                axios.get('/api/users')
                    .then(response => {
                        this.users = response.data;
                        console.log(this.users)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
