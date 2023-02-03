<template>
    <div class="flex flex-col md:flex-row h-full place-content-center gap-[10%]">
        <div class="flex flex-col mb-8 md:mb-0">
            <div v-if="!this.loading1 && !this.done1" class="flex flex-row place-content-center m-auto">
                <button class="btn btn-primary" @click="apiCallBasketteurs()">Importation basketballers</button>
            </div>
            <i v-if="this.done1" class="fa-solid fa-check fa-3x m-auto mt-6"></i>
            <div v-if="this.loading1" class="flex justify-center my-10">
                <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray animate-spin fill-cyan" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
        </div>
        <div class="flex flex-col mb-8 md:mb-0">
            <p v-if="!this.dateOk" class="m-auto">Uniquement</p>
            <div v-if="!this.loading2 && !this.done2" class="flex flex-row place-content-center my-4">
                <button class="btn" :class="{'btn-primary': this.dateOk, 'btn-disabled': !this.dateOk}"
                :disabled='!this.dateOk' @click="apiCallStats()">Importation stats</button>
            </div>
            <p v-if="!this.dateOk" class="m-auto">le lundi</p>
            <i v-if="this.done2" class="fa-solid fa-check fa-3x m-auto mt-6"></i>
            <div v-if="this.loading2" class="flex justify-center my-10">
                <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray animate-spin fill-cyan" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
        </div>
        <div class="flex flex-col mb-8 md:mb-0">
            <p v-if="!this.dateOk" class="m-auto">Uniquement</p>
            <div v-if="!this.loading3 && !this.done3" class="flex flex-row place-content-center my-4">
                <button class="btn" :class="{'btn-primary': this.dateOk, 'btn-disabled': !this.dateOk}"
                :disabled='!this.dateOk' @click="calculResults()">Calcul résultats</button>
            </div>
            <p v-if="!this.dateOk" class="m-auto">le lundi</p>
            <i v-if="this.done3" class="fa-solid fa-check fa-3x m-auto mt-6"></i>
            <div v-if="this.loading3" class="flex justify-center my-10">
                <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray animate-spin fill-cyan" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
        </div>
    </div>
    
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            loading1: false,
            done1: false,
            loading2: false,
            done2: false,
            loading3: false,
            done3: false,
            dateOk: false
        }
    },
    methods: {
        async apiCallBasketteurs() {
            if (!this.loading1) {
                this.loading1 = true
                let pages = 0
                await fetch('https://www.balldontlie.io/api/v1/players?per_page=100')
                    .then(response => response.json())
                    .then(data => {pages = data.meta.total_pages})

                let players = await this.formatPlayers(pages)

                await axios.post('/ajoutBasketteurs', {
                    basketballers: players
                }).catch(error => {
                    console.log(error.response.data)
                })

                this.loading1 = false
                this.done1 = true
            }
        },

        async formatPlayers(pages){
            let callData = []
            for(let i = 1; i <= pages; i++){
                await fetch('https://www.balldontlie.io/api/v1/players?per_page=100&page=' + i)
                    .then(response => response.json())
                    .then(data => {callData.push(data.data)})
            }
            let initPlayers = []
            callData.forEach(players => {
                players.forEach(player => {
                    initPlayers.push(player)
                })
            })
            let players = []
            initPlayers.forEach(element => {
                let position = null
                position = this.setPlayerPosition(element.position)
                let player = {
                    name: element.first_name + ' ' + element.last_name,
                    team: element.team.full_name,
                    position: position,
                    odds: Math.floor(Math.random() * 51),
                    status: 'available'
                }
                players.push(player)
            })
            return players
        },

        setPlayerPosition(position){
            switch (position) {
                    case 'C':
                        return 'Pivot'
                    case 'G':
                        return 'Arrière'
                    case 'F':
                        return 'Ailier'
                    case 'C-F' || 'F-C':
                        return 'Ailier Fort'
                    case 'G-F' || 'F-G':
                        return 'Meneur'
                    default:
                        return 'Flexible'
            }
            return 'Flexible'
        },
        
        async apiCallStats() {
            if (!this.loading2) {
                this.loading2 = true
                let pages = 0

                let date = new Date()
                date.setDate(date.getDate() - 4)
                let startDate = `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`
                date.setDate(date.getDate() + 3)
                let endDate = `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`
                await fetch('https://www.balldontlie.io/api/v1/stats?per_page=100&start_date=' + startDate + '&end_date=' + endDate)
                    .then(response => response.json())
                    .then(data => {pages = data.meta.total_pages})
                    
                let stats = await this.formatStats(pages, startDate, endDate)
                await axios.post('/ajoutStats', {
                    statistics: stats
                }).catch(error => {
                    console.log(error.response.data)
                })

                this.loading2 = false
                this.done2 = true
            }
        },

        async formatStats(pages, startDate, endDate){
            let callData = []
            for(let i = 1; i <= pages; i++){
                await fetch('https://www.balldontlie.io/api/v1/stats?per_page=100&page=' + i + '&start_date=' + startDate + '&end_date=' + endDate)
                    .then(response => response.json())
                    .then(data => {callData.push(data.data)})
            }
            let initStats = []
            callData.forEach(stats => {
                stats.forEach(stat => {
                    initStats.push(stat)
                })
            })
            let stats = []
            initStats.forEach(element => {
                let stat = {
                    basketballer_name: element.player.first_name + ' ' + element.player.last_name,
                    date: element.game.date.substring(0, 10),
                    points: element.pts == null ? 0 : element.pts,
                    note: this.calculNote(element),
                }
                stats.push(stat)
            })
            return stats
        },

        calculNote(element){
            return (10*((element.pts / 50) + (element.reb / 10) + (element.stl / 10))/3).toFixed(2)
        },

        async calculResults(){
            this.loading3 = true
            let player1list = []
            let player2list = []
            let gamenumberlist = []
            await axios.post('/games')
                .then(response => {
                    response.data.forEach(element => {
                        player1list.push(element.home_player_id)
                        player2list.push(element.visiting_player_id)
                        gamenumberlist.push(element.game_number)
                    })
                    
                })
            for(let i = 0; i < player1list.length; i++){
                let currentGame = 0
                await axios.post('/ligues/' + player1list[i] + '/currentGame')
                    .then(response => {
                        currentGame = response.data[0].current_game
                    })
                if(currentGame == gamenumberlist[i]){
                    await this.calculResult(player1list[i], player2list[i])
                    await axios.post('/ligues/' + player1list[i] + '/incrementCurrentGame')
                }
            }
            this.loading3 = false
            this.done3 = true
        },

        async calculResult(player1, player2){
            let lineup1 = []
            let lineup2 = []
            await axios.post('/games/' + player1)
                .then(response => {
                    lineup1.push(response.data[0].pointGuard)
                    lineup1.push(response.data[0].shootingGuard)
                    lineup1.push(response.data[0].smallForward)
                    lineup1.push(response.data[0].powerForward)
                    lineup1.push(response.data[0].center)
                })
            await axios.post('/games/' + player2)
                .then(response => {
                    lineup2.push(response.data[0].pointGuard)
                    lineup2.push(response.data[0].shootingGuard)
                    lineup2.push(response.data[0].smallForward)
                    lineup2.push(response.data[0].powerForward)
                    lineup2.push(response.data[0].center)
                })
            let points1 = 0
            let points2 = 0
            for(let element of lineup1) {
                await axios.post('/games/' + element + '/points')
                    .then(response => {
                        let points = response.data.points
                        if(points != null){
                            points1 += points
                        }
                    })
            }
            for(let element of lineup2) {
                await axios.post('/games/' + element + '/points')
                    .then(response => {
                        let points = response.data.points
                        if(points != null){
                            points2 += points
                        }
                    })
            }
            await axios.post('/games/' + player1 + '/' + player2 + '/' + points1 + '/' + points2)
                .then(response => {
                    console.log(response.data)
                    
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        },

        setDateOk(){
            let date = new Date()
            let jour = ((date.getDay()+6)%7)
            this.dateOk = jour == 0
        }
    },
    mounted() {
        this.setDateOk()
    }
}
</script>