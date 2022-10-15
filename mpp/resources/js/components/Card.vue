<template>
    <div class="card p-4 border-2 border-red-600 rounded bg-orange-400">
        <h3 class="text-white">{{name}}</h3>
    </div>
</template>

<script>
export default {
    props: {
        name: String
    }
}
</script>

<style>

</style>