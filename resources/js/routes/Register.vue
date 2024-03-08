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
        email: ''
    }),
    methods: {
        register() {
            axios.post('/register', {
                name: this.name,
                country: this.country,
                phone: this.phone,
                email: this.email
            }).then((response) =>{
                this.$router.push('/home')
            })
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
                    required
                    background-color="white"
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
                    required
                    background-color="white"
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
                    required
                    background-color="white"
                    dense
                    outlined
                    rounded
                    single-line
                ></v-text-field>
                <v-text-field
                    v-model="email"
                    label="Email"
                    type="email"
                    required
                    background-color="white"
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

<style lang="sass">
    $select-dense-selections-margin: 5px 4px 3px 5px
</style>
