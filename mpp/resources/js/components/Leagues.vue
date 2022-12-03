<template>
    <div class="
        flex
        flex-col sm:flex-row
        items-center sm:justify-around
        space-y-4 sm:space-y-0
        mt-4 sm:mt-10 sm:mx-32
    ">
        <button class="btn-primary w-full sm:w-32" @click="showJoinPanel = !showJoinPanel">
            Rejoindre
            <i class="fa-solid fa-magnifying-glass-arrow-right"></i>
        </button>
        <button class="btn-primary w-full sm:w-32">
            Créer
            <i class="fa-solid fa-circle-plus"></i>
        </button>
    </div>
    <join-panel @close="showJoinPanel = !showJoinPanel" :shown="showJoinPanel"></join-panel>
    <hr>
    <div class="
        my-4 sm:my-10 sm:mx-8
        grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4
    ">
        <div class="mb-4 flex justify-center" v-for="league in leagues">
            <card-league :name="league.name"></card-league>
        </div>
    </div>
</template>

<script>
import CardLeague from './CardLeague.vue'
import JoinPanel from "./JoinPanel.vue"

export default {
    components: {
        JoinPanel,
        CardLeague,
    },
    props: {
        leagues: Array
    },
    data() {
        return {
            showJoinPanel: false
        }
    },
    methods: {
    }
}
</script>

<style>

</style>
