<template>
    <div class="flex flex-col h-full">
        <h1 style="text-align: center">MPP</h1>
        <div class="border-2 rounded p-4">

        </div>
        <div class="flex flex-wrap m-auto w-3/4 h-3/4 place-content-center gap-x-[15%] gap-y-[10%]">
            <card-league v-for="name in names" :name="name"></card-league>
        </div>
    </div>
</template>

<script>
import CardLeague from './CardLeague.vue'

export default {
    components: {
        CardLeague,
    },
    data() {
        return {
            names: ["1", "2", "3", "4"]
        }
    },
}
</script>

<style>

</style>
