<template>
    <div class="card w-full sm:w-80">
        <p class="flex justify-between items-center">
            <span>
                {{name}}
            </span>
            <i
                v-if="canBeFavorite"
                :class="isFavorite ? 'fa-solid' : 'fa-regular'"
                class="fa-star text-gold hover:text-gold-dark cursor-pointer"
                @click="makeFavorite"
            ></i>
        </p>
        <hr>
        <div>
            <p><i class="fa-solid fa-user"></i></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: Number,
        name: String,
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
            this.isFavorite = !this.isFavorite
            this.loading = true
            
            await axios
            .post(this.urlFavorite, {
                league_id: this.id
            })  

            this.loading = false
        }
    },
    mounted() {
        this.isFavorite = this.favorite
    },
}
</script>

<style>

</style>
