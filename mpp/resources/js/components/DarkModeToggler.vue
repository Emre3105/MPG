<template>
    <div class="flex items-center space-x-2.5">
        <i class="fa-regular fa-sun"></i>
        <label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
            <input type="checkbox" id="default-toggle" class="sr-only peer" checked="" @click="toggleDarkMode">
            <div class="
                w-11 h-6 bg-white peer-checked:bg-cyan border border-gray hover:border-gray-dark peer-checked:border-0 rounded-full
                after:absolute after:top-[2px] after:left-[3px] peer-checked:after:left-[1px] after:h-5 after:w-5
                after:bg-cyan peer-checked:after:bg-white after:rounded-full
                peer-checked:after:translate-x-full after:transition-all"
            ></div>
        </label>
        <i class="fa-regular fa-moon"></i>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false
        }
    },
    methods: {
        toggleDarkMode () {
            document.getElementsByTagName('body')[0].classList.toggle('dark')
        }
    }
}
</script>