<template>
    <div :class="shown ? 'max-h-screen md:max-h-96 pb-4 mt-4 -mb-8' : 'max-h-0'" class="
        mt-2 px-4
        transition-all duration-300 ease-out
        overflow-hidden
    ">
        <hr class="-mx-4 mt-8" v-if="shown">
        <div :class="shown ? 'mt-4' : 'mt-12'" class="flex sm:items-center">
            <form class="hidden sm:block" @submit.prevent="join('large')">
                <span class="text-lg">J'ai un code : </span>
                <input class="form-text-input ml-0.5" type="text" placeholder="Dx2mA63E" v-model="largeScreenCode" required>
                <button type="submit" class="ml-4" :class="loading ? 'btn-loading' : 'btn-primary'">Rejoindre la ligue</button>
            </form>
            <i class="ml-auto cursor-pointer fa-regular fa-circle-xmark text-3xl hover:text-gray-dark dark:hover:text-gray-very-lightest" @click="hide"></i>
        </div>
        <form class="sm:hidden mt-4" @submit.prevent="join('small')">
            <input class="form-text-input w-full" type="text" placeholder="Dx2mA63E" v-model="smallScreenCode" required>
            <button class="w-full mt-1.5" :class="loading ? 'btn-loading' : 'btn-primary'">Rejoindre la ligue</button>
        </form>
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 mx-4 mt-4 -mb-4">
            <div class="mb-4" v-for="league in recommendedLeagues">
                <card-league
                    :league="league"
                    class="mx-auto cursor-pointer"
                    @click="showJoinModal(league.code, league.name)"
                ></card-league>
            </div>
        </div>
    </div>
    <join-modal
        v-if="joinModalShown"
        :code="joinModalCode"
        :name="joinModalName"
        :url-join="(urlJoin.slice(0, -1) + joinModalCode)"
        @cancel="joinModalShown = false"
    ></join-modal>
</template>

<script>
import CardLeague from './CardLeague.vue'
import JoinModal from './JoinModal.vue'

export default {
    emits: ['close'],
    components:{
        CardLeague,
        JoinModal
    },
    props: {
        shown: Boolean,
        urlJoin: String,
        urlShow: String,
        recommendedLeagues: Object
    },
    data() {
        return {
            largeScreenCode: '',
            smallScreenCode: '',
            joinModalShown: false,
            joinModalCode: '',
            joinModalName: '',
            loading: false
        }
    },
    methods:{
        hide() {
            this.$emit('close')
        },
        async join(screenSize) {
            if (!this.loading) {
                this.loading = true
                const code = screenSize == "large" ? this.largeScreenCode : this.smallScreenCode
                await axios.get(this.urlJoin.slice(0, -1) + code)
                window.location.href = this.urlShow.slice(0, -1) + code
            }
        },
        showJoinModal (code, name) {
            this.joinModalCode = code
            this.joinModalName = name
            this.joinModalShown = true
        }
    }
}
</script>