<template>
    <div id="join-modal" class="
        fixed top-0 left-0
        w-full h-full
        bg-black bg-opacity-30
        flex justify-center items-center
    ">
        <div class="w-96 bg-white rounded text-gray-dark p-4 mx-4">
            <div class="flex space-x-1">
                <p class="text-2xl">Êtes-vous certain(e) de vouloir valider votre mercato ?</p>
                <i class="fa-solid fa-xmark text-lg cursor-pointer h-min hover:text-gray-dark" @click="cancel()"></i>
            </div>
            <div class="flex flex-col sm:flex-row justify-around mt-4 sm:mt-8">
                <button class="btn-secondary w-full sm:w-32 mb-4 sm:mb-0" :class="loading ? 'cursor-not-allowed' : ''" @click="cancel()">Annuler</button>
                <button v-if="loading" class="btn-loading w-full sm:w-32">Valider</button>
                <button v-else="loading" class="btn-danger w-full sm:w-32" @click="validate()">Valider</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    emits: ['validate', 'cancel'],
    props: {
        loading: {
            type: Boolean,
            default: false
        }
    },
    methods:{
        validate() {
            if (!this.loading) {
                this.$emit('validate')
            }
        },
        cancel() {
            if (!this.loading) {
                this.$emit('cancel')
            }
        }
    },
    mounted() {
        document.addEventListener('keyup', (e) => {
            if (e.key === "Escape") {
                this.cancel()
            }
        })

        document.addEventListener('click', (e) => { 
            if (e.target.id == "join-modal") {
                this.cancel()
            }     
        });
    },
}
</script>