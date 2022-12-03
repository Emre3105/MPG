<template>
    <div :class="shown ? 'max-h-screen md:max-h-96' : 'max-h-0'" class="
        my-4 px-4
        transition-all duration-300 ease-out
        overflow-hidden
    ">
        <hr class="-mx-4 mt-4" v-if="shown">
        <div :class="shown ? 'mt-4' : 'mt-8'" class="flex sm:items-center mt-4">
            <div class="hidden sm:block">
                <span class="text-lg">J'ai un code : </span>
                <input class="form-text-input ml-0.5" type="text" placeholder="Dx2mA63E">
                <button class="btn-primary ml-4">Rejoindre la ligue</button>
            </div>
            <i class="ml-auto cursor-pointer fa-regular fa-circle-xmark text-3xl hover:text-gray-very-lightest" v-on:click="hide"></i>
        </div>
        <div class="sm:hidden mt-4">
            <input class="form-text-input w-full" type="text" placeholder="Dx2mA63E">
            <button class="btn-primary w-full mt-1.5">Rejoindre la ligue</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 mx-4 mt-4 -mb-4">
            <div class="mb-4 flex justify-center" v-for="name in names">
                <card-league :name="name"></card-league>
            </div>
        </div>
    </div>
</template>

<script>
import CardLeague from './CardLeague.vue'

export default {
    components:{
        CardLeague
    },
    props: {
        shown: Boolean,
    },
    data(){
        return{
            names: ["Ligue n°1", "Ligue n°2", "Ligue n°3", "Ligue n°4"]
        }
    },
    methods:{
        hide(){
            this.$emit('close')
        },
        isNumber: function(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();;
            } else {
                return true;
            }
        }
    },
    mounted() {
        document.addEventListener('keyup', (e) => {
            if (e.key === "Escape" && this.shown) {
                this.hide()
            }
        })
    },
}
</script>

<style scoped>
.bounce-enter-active {
    animation: bounce-in .2s ease-out both;
}

.bounce-leave-active {
    animation: bounce-in .2s reverse ease-in both;
}

@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.10);
    }
    100% {
        transform: scale(1);
    }
}
</style>
