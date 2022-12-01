<template>
    <div class="star">
        <i :class="{'fa-solid fa-star': toggled, 'fa-regular fa-star': !toggled}" v-on:click="toggled = !toggled" ></i>
    </div>
</template>

<script>
export default {
    data() {
        return {
            toggled: false
        }
    }
}
</script>

<style scoped>

</style>
