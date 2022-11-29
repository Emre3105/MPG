<template>
    <div class="absolute top-1/4 inset-x-[20%] h-1/2 bg-gray-very-lightest border border-cyan p-4">
        <div class="flex justify-between">
            <input class="text-3xl px-1" v-model="text" @keypress="isNumber($event)" placeholder="Code...">
            <button class="btn-secondary -ml-64">OK</button>
            <button><i class="quitter fa-regular fa-circle-xmark fa-2x" v-on:click="hide"></i></button>
        </div>
        <div class="flex gap-x-[5%] mt-16">
            <card-league v-for="name in names" :name="name"></card-league>
        </div>
    </div>
</template>

<script>
import CardLeague from './CardLeague.vue'

export default {
    components:{
        CardLeague
    },
    data(){
        return{
            names: ["1", "2", "3"]
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
    }
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
