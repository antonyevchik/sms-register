<script>
import countries from "../countries/index.json";

export default {
    name: "Home",
    data: () => ({

    }),

    methods: {
        logout() {
            axios.get('/logout')
                .then(() => {
                    this.$router.push('/')
                })
        }
    }
}
</script>

<template>
    <v-container>
        <v-card>
            Welcome to app!
            <v-btn @click="logout">Logout</v-btn>
        </v-card>
    </v-container>
</template>

<style lang="sass">

</style>
