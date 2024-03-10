<script>
import countries from '../countries'

export default {
  name: 'Register',
  data: () => ({
    items: countries,
    name: '',
    country: {
      name: '',
      flag: '',
      idd: ''
    },
    phone: '',
    email: '',

    phone_field_disabled: true,

    name_rules: [
      (value) => !!value || 'Full name is required.',
      (value) => (value && value.length >= 3) || 'Min 3 characters'
    ],
    country_rules: [(value) => !!value.name || 'Country is required.'],
    phone_rules: [
      (value) => !!value || 'Phone is required.',
      (value) => (value && value.length >= 5) || 'Min 5 characters'
    ],
    email_rules: [
      (value) => !!value || 'Email is required.',
      (value) => (value && value.length >= 5) || 'Min 5 characters'
    ]
  }),
  methods: {
    formatPhone() {
      let phone = this.phone.replace(/\D/g, '')

      if (phone.length < 3) {
        this.phone = phone
        return
      }
      if (phone.length < 6) {
        this.phone = phone.replace(/(\d{2})(\d{1})/, '$1 $2')
        return
      }
      if (phone.length < 9) {
        this.phone = phone.replace(/(\d{2})(\d{3})(\d{1})/, '$1 $2-$3')
        return
      }
      if (phone.length < 11) {
        this.phone = phone.replace(/(\d{2})(\d{3})(\d{2})(\d{1})/, '$1 $2-$3-$4')
        return
      }
      this.phone = phone.replace(/(\d{2})(\d{3})(\d{2})(\d{2})/, '$1 $2-$3-$4')
    },
    register() {
      axios.get('/sanctum/csrf-cookie').then((response) => {
        axios
          .post('/register', {
            name: this.name,
            country: this.country,
            phone: this.phone,
            email: this.email
          })
          .then((response) => {
            this.$router.push('/home')
          })
      })
    }
  }
}
</script>

<template>
  <v-container class="d-flex justify-center">
    <v-col class="d-flex justify-center" cols="4" sm="4">
      <v-card class="pa-10" color="#dededf" max-width="400px" min-width="300px">
        <v-form @submit.prevent="register">
          <v-text-field
            v-model="name"
            label="Full Name"
            background-color="white"
            required
            :rules="name_rules"
            dense
            outlined
            rounded
            single-line
          ></v-text-field>
          <v-select
            @change="phone_field_disabled = !phone_field_disabled"
            v-model="country"
            :items="items"
            item-text="name"
            return-object
            label="Country"
            :prepend-inner-icon="country.flag"
            background-color="white"
            required
            :rules="country_rules"
            dense
            outlined
            rounded
            single-line
          ></v-select>
          <v-text-field
            @keyup="formatPhone"
            v-model="phone"
            label="Phone Number"
            type="tel"
            :prefix="country.idd"
            background-color="white"
            :disabled="phone_field_disabled"
            required
            :rules="phone_rules"
            dense
            outlined
            rounded
            single-line
          ></v-text-field>
          <v-text-field
            v-model="email"
            label="Email"
            type="email"
            background-color="white"
            required
            :rules="email_rules"
            dense
            outlined
            rounded
            single-line
          ></v-text-field>
          <v-btn type="submit" color="primary" block rounded>Register</v-btn>
        </v-form>
      </v-card>
    </v-col>
  </v-container>
</template>
