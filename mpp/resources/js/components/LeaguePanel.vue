<template>
    <transition appear name="slide-fade">
        <div v-if="showAlert" class="fixed top-0 left-0 w-full alert alert-success">
            <p>Le code a bien été copié dans le presse papier</p>
        </div>
    </transition>
    <div v-if="league.status == 0">
        <!-- league didn't start yet -->
        <h1 class="text-3xl text-center mb-8">{{league.name}}</h1>
        <div class="card">
            <p>Nombre de joueurs : {{ league.current_players }} / {{ league.max_players }}</p>
            <hr>
            <div class="text-lg space-y-2">
                <p v-for="item in data">{{item.username}}</p>
                <a v-if="league.admin_id == auth && league.current_players == league.max_players" :href="urlLaunchLeague" class="block">
                    <button class="btn-primary w-full">
                        <i class="fa-solid fa-forward-step"></i>
                        Lancer la ligue
                    </button>
                </a>
                <button v-if="league.admin_id == auth && league.current_players != league.max_players" class="btn-disabled w-full">
                    <i class="fa-solid fa-forward-step"></i>
                    Lancer la ligue
                </button>
                <button class="btn-secondary w-full" @click="copy">
                    <i class="fa-regular fa-copy"></i>
                    Copier le code ligue #{{ league.code }}
                </button>
            </div>
        </div>
    </div>
    <div v-if="league.status == 1 && validated === false">
        <!-- league is in transfer market window -->
        <!-- transfer market is not validated yet -->
        <h1 class="text-3xl text-center mb-8">{{league.name}}</h1>
        <transfer-market
            :url-browse-basketballer="urlBrowseBasketballer"
            :url-browse-bought-basketballer="urlBrowseBoughtBasketballer"
            :url-browse-bought-basketballer-by-player="urlBrowseBoughtBasketballerByPlayer"
            :url-browse-bid="urlBrowseBid"
            :url-save-bid="urlSaveBid"
            :url-import="urlImport"
            :url-validate="urlValidate"
            :league-id="league.id"
        ></transfer-market>
    </div>
    <div v-if="league.status == 1 && validated === true">
        <!-- league is in transfer market window -->
        <!-- transfer market is already validated -->
        <h1 class="text-3xl text-center mb-8">{{league.name}}</h1>
        <p class="italic text-center">[Vous avez déjà validé votre mercato. Veuillez attendre la validation des autres joueurs.]</p>
    </div>
    <div v-if="league.status == 2">
        <!-- league is in progress -->
        <h1 class="text-3xl text-center mb-8">{{league.name}}</h1>
        <div>
            <div class="flex justify-center">
                <div 
                    class="px-4 sm:px-8 py-3 cursor-pointer sm:text-xl" 
                    :class="currentTab === 'Ma compo' ? 'border-b-2' : ''" 
                    @click="currentTab = 'Ma compo'"
                >
                    Ma compo
                </div>
                <div 
                    class="px-4 sm:px-8 py-3 cursor-pointer sm:text-xl" 
                    :class="currentTab === 'Calendrier' ? 'border-b-2' : ''" 
                    @click="currentTab = 'Calendrier'"
                >
                    Calendrier
                </div>
                <div 
                    class="px-4 sm:px-8 py-3 cursor-pointer sm:text-xl" 
                    :class="currentTab === 'Classement' ? 'border-b-2' : ''" 
                    @click="currentTab = 'Classement'"
                >
                    Classement
                </div>
            </div>
            <div class="mt-8">
                <div v-show="currentTab === 'Ma compo'">
                    <line-up
                        :url-browse-basketballer-player="urlBrowseBasketballerPlayer"
                        :url-save-line-up="urlSaveLineUp"
                        :url-browse-line-up="urlBrowseLineUp"
                        :league-id="league.id"
                    ></line-up>
                </div>
                <div v-show="currentTab === 'Calendrier'">
                    <games-calendar
                        :league="league"
                        :url-browse-game="urlBrowseGame"
                        :url-browse-players="urlBrowsePlayers"
                    ></games-calendar>
                </div>
                <div v-if="currentTab === 'Classement'">
                    <leaderboard-panel :players="data"></leaderboard-panel>
                </div>
            </div>
        </div>
    </div>
    <div v-if="league.status === 3">
        <!-- league is finished -->
        <h1 class="text-3xl text-center mb-10">Ligue {{league.name}} terminée !</h1>
        <h2 class="text-2xl text-center mb-8">Classement final</h2>
        <leaderboard-panel v-if="!loading" :players="data"></leaderboard-panel>
    </div>
</template>
  
<script>
import LineUp from './LineUp.vue'
import GamesCalendar from './GamesCalendar.vue'

export default {
    components: {
        LineUp, GamesCalendar
    },
    props: {
        league: Object,
        validated: Boolean,
        auth: Number,
        urlBrowsePlayerNames: String,
        urlBrowsePlayers: String,
        urlLaunchLeague: String,
        urlBrowseBasketballer: String,
        urlBrowseBasketballerPlayer: String,
        urlBrowseBoughtBasketballer: String,
        urlBrowseBoughtBasketballerByPlayer: String,
        urlBrowseBid: String,
        urlBrowsePlayer: String,
        urlSaveBid: String,
        urlSaveLineUp: String,
        urlBrowseLineUp: String,
        urlImport: String,
        urlValidate: String,
        urlBrowseGame: String
    },
    data() {
        return {
            loading: true,
            data: null,
            showAlert: false,
            currentTab: 'Ma compo',
        }
    },
    methods: {
        async load() {
            await axios
                .post(this.urlBrowsePlayerNames)
                .then(response => (
                    this.data = response.data
                ))
            for (let i = 0; i < this.data.length; i++) {
                let rand = Math.floor(Math.random() * this.data.length)
                this.data[i]["victoires"] = rand
                this.data[i]["defaites"] = this.data.length - rand
                this.data[i]["scoreavg"] = Math.floor(Math.random() * 100)
            }
        },
        async copy() {
            if (!this.showAlert) {
                navigator.clipboard.writeText(this.league.code)
                this.showAlert = true
                await new Promise(resolve => setTimeout(resolve, 1500));
                this.showAlert = false
            }
        }
    },
    async mounted() {
        this.loading = true
        await this.load()
        this.loading = false
    },
}
</script>

<style>
.slide-fade-enter-from {
    transform: translateY(-50px);
    opacity: 0;
}
.slide-fade-enter-active {
    transition: all .1s ease;
}
.slide-fade-enter-to {
    transform: translateY(0px);
    opacity: 1;
}
/* .slide-fade-leave-from {
    default opacity: 1;
} */
.slide-fade-leave-active {
    transition: opacity .3s;
}
.slide-fade-leave-to {
    opacity: 0;
}
</style>