<template>
    <div id="basketballer-selection-modal" class="
        fixed top-0 left-0
        w-full h-full
        bg-black bg-opacity-30
        flex justify-center items-center
        z-20
    ">
        <div class="w-96 bg-white rounded text-gray-dark p-4 mx-4">
            <div class="flex space-x-1">
                <p class="text-2xl w-full">Sélectionner un joueur</p>
                <i class="fa-solid fa-xmark text-lg cursor-pointer h-min hover:text-gray-dark" @click="cancel()"></i>
            </div>
            <div class="mt-4">
                <div v-for="basketballer in basketballers" class="flex items-center py-2 space-x-2 border-t hover:bg-gray-very-lightest cursor-pointer px-2" @click="select(basketballer.id)">
                    <p class="font-bold text-gray-light w-16">{{ getAcronym(basketballer.position) }}</p>
                    <p class="font-bold w-full">{{ basketballer.name }}</p>
                    <p class="w-full">{{ basketballer.team }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    emits: ['select', 'cancel'],
    props: {
        basketballers: Array,
    },
    methods:{
        cancel() {
            this.$emit('cancel')
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
            if (position == "Flexible") {
                return "F"
            }
            return "ERR"
        },
        select(id) {
            this.$emit('select', id)
        },
    },
    mounted() {
        document.addEventListener('keyup', (e) => {
            if (e.key === "Escape") {
                this.cancel()
            }
        })

        document.addEventListener('click', (e) => { 
            if (e.target.id == "basketballer-selection-modal") {
                this.cancel()
            }     
        });
    },
}
</script>