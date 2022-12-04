<template>
    <div :class="shown ? 'max-h-screen md:max-h-96' : 'max-h-0'" class="
        my-4 px-4
        transition-all duration-300 ease-out
        overflow-hidden
    ">
        <hr class="-mx-4 mt-4" v-if="shown">
        <div :class="shown ? 'mt-4' : 'mt-8'" class="flex sm:items-center mt-4">
            <div class="hidden sm:block">
                <span class="text-lg">J'ai un code : </span>
                <input class="form-text-input ml-0.5" type="text" placeholder="Dx2mA63E">
                <button class="btn-primary ml-4">Rejoindre la ligue</button>
            </div>
            <i class="ml-auto cursor-pointer fa-regular fa-circle-xmark text-3xl hover:text-gray-very-lightest" @click="hide"></i>
        </div>
        <div class="sm:hidden mt-4">
            <input class="form-text-input w-full" type="text" placeholder="Dx2mA63E">
            <button class="btn-primary w-full mt-1.5">Rejoindre la ligue</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 mx-4 mt-4 -mb-4">
            <div class="mb-4 flex justify-center" v-for="league in recommendedLeagues">
                <card-league :name="league.name"></card-league>
            </div>
        </div>
    </div>
</template>

<script>
import CardLeague from './CardLeague.vue'

export default {
    components:{
        CardLeague
    },
    props: {
        shown: Boolean,
        recommendedLeagues: Array
    },
    methods:{
        hide() {
            this.$emit('close')
        }
    },
    mounted() {
        // document.addEventListener('keyup', (e) => {
        //     if (e.key === "Escape" && this.shown) {
        //         this.hide()
        //     }
        // })
    },
}
</script>

<style>

</style>
