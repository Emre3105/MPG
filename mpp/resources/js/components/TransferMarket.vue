<template>
    <div class="flex justify-between mt-8">
        <div class="w-1/2 mr-4">
            <basketballers-table
                :url-browse="urlBrowseBasketballer"
                :transfer-market="true"
            ></basketballers-table>
        </div>
        <div class="w-1/2">
            <p>Liste des enchères</p>
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
            bids: null
        }
    },
    methods: {
        async load() {
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
    },
    mounted() {
        this.load()
    },
}
</script>
