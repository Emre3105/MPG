<template>
    <div class="card w-full sm:w-80">
        <p class="flex justify-between items-center">
            <span>
                {{name}}
            </span>
            <i
                v-if="canBeFavorite"
                :class="[isFavorite ? 'fa-solid' : 'fa-regular', loading ? 'text-gray-lightest cursor-progress' : 'text-gold hover:text-gold-dark cursor-pointer']"
                class="fa-star"
                @click="makeFavorite"
            ></i>
        </p>
        <hr>
        <div>
            <p>
                <i class="fa-solid fa-people-group"></i>
                <span> : {{currentPlayers}}/{{maxPlayers}} Joueurs</span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: Number,
        name: String,
        currentPlayers: Number,
        maxPlayers: Number,
        canBeFavorite: Boolean,
        favorite: Boolean,
        urlFavorite: String
    },  
    data() {
        return {
            loading: false,
            isFavorite: false
        }
    },
    methods: {
        async makeFavorite() {
            if (!this.loading) {
                this.loading = true
                
                await axios
                .post(this.urlFavorite, {
                    league_id: this.id
                })

                this.isFavorite = !this.isFavorite
                this.loading = false
            }
        }
    },
    mounted() {
        this.isFavorite = this.favorite
    },
}
</script>

<style>

</style>
