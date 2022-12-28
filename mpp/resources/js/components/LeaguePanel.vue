<template>
    <transition appear name="slide-fade">
        <div v-if="showAlert" class="fixed top-0 left-0 w-full alert alert-success">
            <p>Le code a bien été copié dans le presse papier</p>
        </div>
    </transition>
    <div v-if="league.status == 0">
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
</template>
  
<script>
export default {
    props: {
        league: Object,
        auth: Number,
        urlBrowsePlayers: String,
        urlLaunchLeague: String
    },
    data() {
        return {
            loading: false,
            data: null,
            showAlert: false
        }
    },
    methods: {
        async load() {
            if (!this.loading) {
                this.loading = true
    
                await axios
                    .post(this.urlBrowsePlayers)
                    .then(response => (
                        this.data = response.data
                    ))
                
                this.loading = false
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
    mounted() {
        this.load()
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
.slide-fade-leave-from {
    /* default opacity: 1;*/
}
.slide-fade-leave-active {
    transition: opacity .3s;
}
.slide-fade-leave-to {
    opacity: 0;
}
</style>