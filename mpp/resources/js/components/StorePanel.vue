<template>
    <div :class="shown ? 'max-h-screen md:max-h-60' : 'max-h-0'" class="
        my-4 px-4
        transition-all duration-300 ease-out
        overflow-hidden
    ">
        <hr class="-mx-4 mt-4" v-if="shown">
        <div :class="shown ? 'mt-4' : 'mt-8'" class="w-full text-right">
            <i class="ml-auto cursor-pointer fa-regular fa-circle-xmark text-3xl hover:text-gray-dark dark:hover:text-gray-very-lightest" @click="hide"></i>
            <form class="mt-4 form lg:w-1/2 mx-auto" @submit.prevent="store">
                <div class="form-group">
                    <input class="form-text-input" id="nameInput" type="text" placeholder="Nom" v-model="name" required>
                </div>
                <div class="form-group">
                    <select class="form-text-input" id="maxPlayersInput" v-model="maxPlayers" required>
                        <option value="" disabled selected>&ltNombre de joueurs&gt</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <button class="w-full" :class="loading ? 'btn-loading' : 'btn-primary'">Créer ma ligue</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    emits: ['close'],
    props: {
        shown: Boolean,
        urlStore: String,
    },
    data() {
        return {
            loading: false,
            name: '',
            maxPlayers: ''
        }
    },
    methods: {
        hide() {
            this.$emit('close')
        },
        async store() {
            if (!this.loading) {
                this.loading = true
                await axios
                .post(this.urlStore, {
                    name: this.name,
                    max_players: this.maxPlayers
                })
                this.loading = false
            }
        }
    }
}
</script>

<style>

</style>
