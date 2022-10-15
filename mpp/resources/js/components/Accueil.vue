<template>
    <div>
        <h1>Accueil</h1>
        <div class="cards">
            <card v-for="name in names" :name="name"></card>
        </div>
    </div>
</template>

<script>
import Card from './Card.vue'

export default {
    components: {
        Card,
    },
    data() {
        return {
            names: ["Emre", "Anthony", "Nour Eddine", "Benzema"]
        }
    },
}
</script>

<style>
    .cards {
        padding: 8px;
        width: 33%;
        display: flex;
        justify-content: space-around;
    }
</style>