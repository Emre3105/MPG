<template>
    <div class="flex justify-between mt-8">
        <div class="w-1/2 mr-4">
            <basketballers-table
                :url-browse="urlBrowseBasketballer"
                :transfer-market="true"
                :selected-basketballer-ids="bids"
                @add-bid="(basketballerId) => addBid(basketballerId)"
            ></basketballers-table>
        </div>
        <div class="w-1/2">
            <div class="card">
                <p class="text-center">Mes enchères</p>
                <hr>
                <div>
                    <p v-for="bid in bids">{{ bid }}</p>
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
            loading: false,
            bids: []
        }
    },
    methods: {
        async loadBids() {
            if (!this.loading) {
                this.loading = true

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
                this.loading = false
            }
        },
        addBid(basketballerId) {
            this.bids.push(basketballerId)
        }
    },
    mounted() {
        this.loadBids()
    },
}
</script>
