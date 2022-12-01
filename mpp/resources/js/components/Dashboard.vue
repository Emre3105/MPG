<template>
    <div class="relative flex flex-col h-full">
        <div class="flex justify-center">--MPP--</div>
        <div class="flex justify-center gap-x-[22%] p-4 py-10">
            <button class="btn-primary w-32" v-on:click="showModal = !showModal">Rejoindre</button>
            <button class="btn-primary w-32">Créer</button>
        </div>
        <hr>
        <div class="flex flex-wrap m-auto w-3/4 h-3/4 place-content-center gap-x-[15%] gap-y-[10%] -mt-6">
            <card-league v-for="name in names" :name="name"></card-league>
        </div>
    </div>

    <transition name="bounce" mode="out-in">
        <menu-rejoindre v-if="showModal" @close="closeModal"></menu-rejoindre>
    </transition>
</template>

<script>
import CardLeague from './CardLeague.vue'
import MenuRejoindre from "./MenuRejoindre.vue"

export default {
    components: {
        MenuRejoindre,
        CardLeague,
    },
    data() {
        return {
            names: ["1", "2", "3", "4"],
            showModal: false
        }
    },
    methods: {
        closeModal(){
            this.showModal = false
        }
    }
}
</script>

<style>

</style>
