<template>
    <div class="w-full flex justify-center">
        <div class="card">
            <p>Création de compte</p>
            <hr>
            <div>
                <!-- il faut que je fasse mon propre axios pour ajouter le csrf : https://pusher.com/tutorials/laravel-vue-axios/ -->
                <form v-on:submit.prevent="formSubmit" method="post" class="form"> <!-- action="register" -->
                    <div class="form-group">
                        <label for="inputUsername">Nom d'utilisateur</label>
                        <input class="form-text-input" type="text" placeholder="Nom d'utilisateur" id="inputUsername" v-model="form.username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Mot de passe</label>
                        <input class="form-text-input" type="password" id="inputPassword" placeholder="Mot de passe" v-model="form.password" name="password" required>
                    </div>
                    <button class="btn-primary w-full">Créer mon compte</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            form: {
                username: '',
                password: ''
            }
        }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault()
            axios.post('/register', {
                username: this.form.username,
                password: this.form.password
            })
            .then(function (response) {
                console.log(response.data)
            })
            .catch(function (error) {
                console.log(error)
            });
        }
    }
}
</script>

<style>

</style>