<template>
    <div :class="shown ? 'max-h-screen md:max-h-96' : 'max-h-0'" class="
        my-4 px-4
        transition-all duration-300 ease-out
        overflow-hidden
    ">
        <hr class="-mx-4 mt-4" v-if="shown">
        <div :class="shown ? 'mt-4' : 'mt-8'" class="flex sm:items-center mt-4">
            <form class="hidden sm:block" @submit.prevent="join">
                <span class="text-lg">J'ai un code : </span>
                <input class="form-text-input ml-0.5" type="text" placeholder="Dx2mA63E" v-model="code" required>
                <button type="submit" class="ml-4" :class="loading ? 'btn-loading' : 'btn-primary'">Rejoindre la ligue</button>
            </form>
            <i class="ml-auto cursor-pointer fa-regular fa-circle-xmark text-3xl hover:text-gray-very-lightest" @click="hide"></i>
        </div>
        <form class="sm:hidden mt-4" @submit.prevent="join">
            <input class="form-text-input w-full" type="text" placeholder="Dx2mA63E" required>
            <button class="w-full mt-1.5" :class="loading ? 'btn-loading' : 'btn-primary'">Rejoindre la ligue</button>
        </form>
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 mx-4 mt-4 -mb-4">
            <div class="mb-4 flex justify-center" v-for="league in recommendedLeagues">
                <card-league
                    :id="league.id"
                    :name="league.name"
                    :current-players="league.current_players"
                    :max-players="league.max_players"
                    :can-be-favorite="false"
                    :favorite="false"
                    url-favorite=""
                ></card-league>
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
        urlJoin: String,
        recommendedLeagues: Array
    },
    data() {
        return {
            code: '',
            loading: false
        }
    },
    methods:{
        hide() {
            this.$emit('close')
        },
        async join() {
            if (!this.loading) {
                this.loading = true
                await axios
                .post(this.urlJoin.slice(0, -1) + this.code)
                this.$emit('reload')
                this.code = ""
                this.loading = false
            }
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
