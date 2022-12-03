<template>
    <div class="card w-full sm:w-80">
        <p class="flex justify-between items-center">
            <span>
                {{name}}
            </span>
            <i
                :class="favorite ? 'fa-solid' : 'fa-regular'"
                class="fa-star text-gold hover:text-gold-dark cursor-pointer"
                @click="favorite = !favorite"
            ></i>
        </p>
        <hr>
        <div>
            <p><i class="fa-solid fa-user"></i></p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: String
    },  
    data() {
        return {
            favorite: false
        }
    },
}
</script>

<style>

</style>
