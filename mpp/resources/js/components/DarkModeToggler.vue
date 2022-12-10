<template>
    <div class="flex items-center space-x-2.5">
        <i class="fa-regular fa-sun"></i>
        <label :for="id" class="inline-flex relative items-center cursor-pointer">
            <input v-if="darkMode" type="checkbox" :id="id" class="sr-only peer" checked="" @click="toggleDarkMode">
            <input v-else type="checkbox" :id="id" class="sr-only peer" @click="toggleDarkMode">
            <div class="
                w-11 h-6 bg-white peer-checked:bg-cyan hover:peer-checked:bg-cyan-dark border border-gray hover:border-gray-dark peer-checked:border-0 rounded-full
                after:absolute after:top-[2px] after:left-[3px] peer-checked:after:left-[1px] after:h-5 after:w-5
                after:bg-cyan hover:after:bg-cyan-dark peer-checked:after:bg-white peer-checked:hover:after:bg-gray-very-lightest after:rounded-full
                peer-checked:after:translate-x-full after:transition-all"
            ></div>
        </label>
        <i class="fa-regular fa-moon"></i>
    </div>
</template>

<script>
export default {
    props: {
        urlDarkMode: String,
        darkMode: Boolean
    },
    data() {
        return {
            show: false,
            id: null,
            loading: false
        }
    },
    methods: {
        async toggleDarkMode () {
            document.getElementsByTagName('body')[0].classList.toggle('dark')
            if (!this.loading) {
                this.loading = true
                await axios.post(this.urlDarkMode)
                this.loading = false
            }
        }
    },
    mounted() {
        this.id = this._uid
    },
}
</script>