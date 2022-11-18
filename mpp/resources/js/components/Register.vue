<template>
    <div>
        <p class="text-2xl mb-4 w-min mx-auto">Création de compte</p>
        <div class="card">
            <p>Création de compte</p>
            <hr>
            <div>
                <!-- il faut que je fasse mon propre axios pour ajouter le csrf : https://pusher.com/tutorials/laravel-vue-axios/ -->
                <form v-on:submit.prevent="formSubmit" method="post"> <!-- action="register" -->
                    <label for="inputUsername">Nom d'utilisateur</label>
                    <input class="form-text-input" type="text" placeholder="Nom d'utilisateur" id="inputUsername" v-model="form.username" name="username" required>

                    <label for="inputPassword">Mot de passe</label>
                    <input class="form-text-input" type="password" id="inputPassword" placeholder="Mot de passe" v-model="form.password" name="password" required>

                    <button class="btn-primary">Créer mon compte</button>
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
            username: '',
            password: '',
            output: '',
            form: {
                username: '',
                password: ''
            }
        }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            let currentObj = this;
            axios.post('/register', {
                username: this.form.username,
                password: this.form.password
            })
            .then(function (response) {
                currentObj.output = response.data;
            })
            .catch(function (error) {
                currentObj.output = error;
            });
        }
    }
}
</script>

<style>

</style>