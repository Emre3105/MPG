<template>
    <div class="card">
        <p>Yo{{league}} <star></star></p>
        <hr>
        <div>
            <p><i class="fa-solid fa-user"></i></p>
        </div>
    </div>
</template>

<script>
import Star from "./Star.vue";

export default {
    components: {Star},
    props: ['league']
}

</script>

<style>

</style>
