<template>
    <div>
        <h1>Accueil</h1>
        <div class="border-2 rounded p-4 flex justify-around w-1/3">
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

</style>