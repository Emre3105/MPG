<template>
    <div v-if="loading" class="flex justify-center my-10">
        <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray animate-spin fill-cyan" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
    </div>
    <div v-else class="flex flex-col md:flex-row justify-between mt-8 space-y-8 md:space-y-0 md:space-x-4">
        <div class="md:w-1/2">
            <basketballers-table
                :url-browse="urlBrowseBasketballer"
                :basketballers="basketballers"
                :transfer-market="true"
                :selected-basketballer-ids="bids"
                @add-bid="(basketballerId) => addBid(basketballerId)"
            ></basketballers-table>
        </div>
        <div class="md:w-1/2">
            <div class="card">
                <p class="text-center mr-2">Mes enchères</p>
                <hr>
                <div class="space-y-2">
                    <p class="text-sm text-right">
                        Budget restant : {{ remainingBudget }}M / 250M
                    </p>
                    <div v-for="bid in bids" class="flex items-center">
                        <p class="font-bold w-10">{{ getAcronym(bid.position) }}</p>
                        <p class="w-full">{{ bid.name }}</p>
                        <p>{{ bid.odds }}</p>
                        <div class="form-group ml-2 mr-6">
                            <input
                                class="form-text-input w-8 p-1 text-center"
                                :class="bid.price < bid.odds ? 'border-red outline-red text-red' : ''"
                                type="text"
                                :value="bid.price"
                                @change="updateBid(bid.id, $event.target.value)"
                            >
                        </div>
                        <i class="fa-solid fa-trash-can cursor-pointer hover:scale-110" @click="removeBid(bid.id)"></i>
                    </div>
                    <button v-if="dataChanged && isValid" class="btn-primary w-full" @click="save">Enregister</button>
                    <button v-if="dataChanged && !isValid" class="btn-disabled w-full">Enregister</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        urlBrowseBasketballer: String,
        urlBrowseBid: String,
        leagueId: {
            type: Number,
            default: null
        },
    },
    data() {
        return {
            loading: true,
            bids: [],
            basketballers: [],
            dataChanged: false,
            isValid: false,
            remainingBudget: 250
        }
    },
    methods: {
        addBid(basketballerId) {
            const bid = this.findBid(basketballerId)
            if (!bid) {
                const basketballer = this.basketballers.filter((el) => {
                    return el.id == basketballerId
                })[0]
                basketballer.price = basketballer.odds
                this.bids.push(basketballer)
                this.remainingBudget = this.remainingBudget - basketballer.price
                this.updateIsValid()
            }
        },
        areAllPricesValid() {
            let res = true
            this.bids.forEach((bid) => {
                if (bid.price < bid.odds) {
                    res = false
                }
            })
            return res
        },
        areAllPositionsPresent() {
            let res = true
            const positions = ["Ailier", "Ailier Fort", "Arrière", "Meneur", "Pivot"]
            positions.forEach((position) => {
                if (!this.isPositionPresent(position)) {
                    res = false
                }
            })
            return res
        },
        findBid(basketballerId) {
            return this.bids.filter((el) => {
                return el.id == basketballerId
            })[0]
        },
        getAcronym(position) {
            if (position == "Ailier") {
                return "AL"
            }
            if (position == "Ailier Fort") {
                return "ALF"
            }
            if (position == "Arrière") {
                return "AR"
            }
            if (position == "Meneur") {
                return "M"
            }
            if (position == "Pivot") {
                return "P"
            }
            return "ERR"
        },
        isPositionPresent(position) {
            return this.bids.filter((bid) => {
                return bid.position == position
            }).length > 0
        },
        async loadBasketballers() {
            await axios
            .post(this.urlBrowseBasketballer, {
                column: "odds",
                direction: "desc"
            })
            .then(response => (
                this.basketballers = response.data
            ))
        },
        async loadBids() {
            if (this.leagueId == null) {
                await axios
                .post(this.urlBrowseBid)
                .then(response => (
                    this.bids = response.data
                ))
            } else {
                await axios
                .post(this.urlBrowseBid, {
                    league_id: this.leagueId
                })
                .then(response => (
                    this.bids = response.data
                ))
            }
            this.bids.forEach((bid) => {
                this.remainingBudget = this.remainingBudget - bid.price
            })
        },
        removeBid(basketballerId) {
            const bid = this.findBid(basketballerId)
            this.bids = this.bids.filter((bid) => {
                return bid.id != basketballerId
            })
            this.remainingBudget = this.remainingBudget + bid.price
            this.updateIsValid()
        },
        updateBid(basketballerId, price) {
            const bidIndex = this.bids.findIndex((bid => bid.id == basketballerId))
            this.remainingBudget = this.remainingBudget + this.bids[bidIndex].price
            this.bids[bidIndex].price = parseInt(price)
            this.remainingBudget = this.remainingBudget - price
            this.updateIsValid()
        },
        updateIsValid() {
            this.dataChanged = true
            if (this.bids.length >= 8 && this.remainingBudget >= 0 && this.areAllPricesValid() && this.areAllPositionsPresent()) {
                this.isValid = true
            } else {
                this.isValid = false
            }
        }
    },
    async mounted() {
        this.loading = true
        await this.loadBasketballers()
        await this.loadBids()
        this.loading = false
    },
}
</script>
