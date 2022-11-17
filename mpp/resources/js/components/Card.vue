<template>
    <div class="card p-4 border-2 border-red-600 rounded bg-orange-400">
        <i class="fa-solid fa-basketball"></i>
        <h3 class="text-dark">{{name}}</h3>
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
