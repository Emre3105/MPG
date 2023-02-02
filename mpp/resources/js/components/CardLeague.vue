<template>
    <div class="card w-full sm:w-80 hover:scale-[1.01]">
        <p class="flex justify-between items-center">
            <span>
                {{league.name}}
            </span>
            <i
                v-if="canBeFavorite"
                :class="[isFavorite ? 'fa-solid' : 'fa-regular', loading ? 'text-gray-lightest cursor-progress' : 'text-gold-dark hover:text-gold-darkest cursor-pointer']"
                class="fa-star"
                @click.stop="makeFavorite"
                @click.stop.prevent="$event.stopPropagation()"
            ></i>
        </p>
        <hr>
        <div>
            <p>
                <i class="fa-solid fa-people-group"></i>
                <span> : {{league.current_players}}/{{league.max_players}} Joueurs</span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        league: Object,
        canBeFavorite: {
            type: Boolean,
            default: false
        },
        favorite: {
            type: Boolean,
            default: false
        },
        urlFavorite: {
            type: String,
            required: false
        },
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
                    league_id: this.league.id
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