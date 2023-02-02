<template>
    <div v-if="!loading" class="space-y-8 text-gray-darkest">
        <div v-for="index in nbDays" :key="index" class="space-y-4">
            <p class="sm:text-xl text-center dark:text-white">Journée {{ index }}</p>
            <div v-for="game in gamesAtDay(index)" class="p-4 border rounded bg-white flex justify-center space-x-2 sm:text-lg">
                <p class="w-full text-right">{{ getPlayerName(game.home_player_id) }}</p>
                <p>{{ game.home_player_points }}</p>
                <p>-</p>
                <p>{{ game.visiting_player_points }}</p>
                <p class="w-full">{{ getPlayerName(game.visiting_player_id) }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        league: Object,
        urlBrowseGame: String,
        urlBrowsePlayers: String
    },
    data() {
        return {
            loading: true,
            games: [],
            players: [],
            nbDays: 0
        }
    },
    methods: {
        gamesAtDay (day) {
            return this.games.filter((game) => {
                return game.game_number == day
            })
        },
        getPlayerName (id) {
            console.log(id)
            return this.players.filter((player) => {
                return player.id == id
            })[0].username
        },
        async loadGames() {
            await axios
            .post(this.urlBrowseGame, {
                league_id: this.league.id
            })
            .then((response) => {
                this.games = response.data
            })
        },
        async loadPlayers() {
            await axios
            .post(this.urlBrowsePlayers)
            .then((response) => {
                this.players = response.data
            })
        }
    },
    async mounted() {
        this.loading = true
        this.nbDays = (this.league.max_players - 1) * 2
        await this.loadGames()
        await this.loadPlayers()
        this.loading = false
    },
}
</script>
