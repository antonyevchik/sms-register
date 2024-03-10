<script>
import store from '../store/index.js'

export default {
  name: 'Home',
  computed: {
    store() {
      return store
    }
  },
  data: () => ({
    user: store.state.auth.user.name
  }),

  methods: {
    logout() {
      axios.get('/logout').then(() => {
        this.$router.push('/')
      })
    }
  }
}
</script>

<template>
  <v-container>
    <v-card class="pa-10">
      <v-card-title> Welcome to app, {{ user }} !</v-card-title>
      <v-card-text>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat orci nisi, in
        vehicula lorem fermentum eget. Nullam cursus finibus sapien nec facilisis. Suspendisse et
        sapien tempus enim molestie posuere sit amet ut turpis. Sed ut commodo magna. Aenean cursus
        ornare nulla nec varius. Curabitur vitae arcu justo. Ut tristique nibh in lorem imperdiet,
        at consectetur nisl finibus. Morbi auctor neque sit amet turpis mattis, vel laoreet nisi
        aliquam
      </v-card-text>
      <v-card-actions>
        <v-btn @click="logout" color="warning">Logout</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>
