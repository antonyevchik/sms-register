<script>
import countries from '../countries'

export default {
    name: "Register",
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

        name_rules: [
            value => !!value || 'Full name is required.',
            value => (value && value.length >= 3) || 'Min 3 characters',
        ],
        country_rules: [
            value => !!value.name || 'Country is required.',
        ],
        phone_rules: [
            value => !!value || 'Phone is required.',
            value => (value && value.length >= 5) || 'Min 5 characters',
        ],
        email_rules: [
            value => !!value || 'Email is required.',
            value => (value && value.length >= 5) || 'Min 5 characters',
        ]

    }),
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/register', {
                    name: this.name,
                    country: this.country,
                    phone: this.phone,
                    email: this.email
                }).then((response) => {
                    this.$router.push('/home')
                })
            });
        }
    }
}
</script>

<template>
    <v-container class="d-flex justify-center">
        <v-col
            class="d-flex justify-center"
            cols="4"
            sm="4"
        >
        <v-card
          class="pa-10"
          color="#dededf"
          max-width="400px"
          min-width="300px"
        >
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
                    v-model="country"
                    :items="items"
                    item-text="name"
                    return-object
                    label="Country"
                    :prepend-inner-icon=country.flag
                    background-color="white"
                    required
                    :rules="country_rules"
                    dense
                    outlined
                    rounded
                    single-line
                ></v-select>
                <v-text-field
                    v-model="phone"
                    label="Phone Number"
                    type="tel"
                    :prefix=country.idd
                    background-color="white"
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
                <v-btn
                    type="submit"
                    color="primary"
                    rounded
                >Register
                </v-btn>
            </v-form>
        </v-card>
        </v-col>
    </v-container>
</template>
