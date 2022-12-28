<template>
    <div class="fixed w-full">
        <nav class="flex flex-wrap items-center justify-between bg-gray-very-lightest dark:bg-gray-darkest border-b border-white text-lg font-bold">
            <div class="w-full relative flex justify-between md:w-auto ml-2 my-1 items-center px-2">
                <a :href="urlHome">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                        width="192.000000pt" height="184.000000pt"
                        viewBox="0 0 192.000000 184.000000" preserveAspectRatio="xMidYMid meet"
                        class="w-14 h-14 fill-gray-darkest dark:fill-white hover:fill-gray-dark dark:hover:fill-gray-very-lightest"
                    >
                        <g transform="translate(0.000000,184.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M803 1707 l-162 -122 -1 -736 0 -735 70 -47 c39 -26 77 -47 85 -47
                            13 0 15 52 15 360 l0 360 240 2 240 3 1 417 c0 230 -2 422 -5 426 -8 14 -306
                            241 -316 241 -3 1 -78 -54 -167 -122z m205 -117 c42 -30 82 -63 108 -88 11
                            -11 14 -69 14 -286 l0 -273 -37 -7 c-49 -8 -247 -8 -267 0 -14 5 -16 40 -16
                            283 0 152 4 281 8 287 4 6 33 29 64 52 31 23 59 46 63 52 9 15 18 13 63 -20z"/>
                            <path d="M1410 836 c0 -482 3 -666 11 -666 18 0 143 70 157 87 9 12 12 78 12
                            245 l0 228 160 0 160 0 0 199 0 199 -52 42 c-29 22 -60 47 -69 54 -60 49 -352
                            268 -364 272 -13 5 -15 -68 -15 -660z m268 220 c60 -45 62 -49 62 -92 l0 -44
                            -75 0 -75 0 0 101 c0 80 3 99 13 92 6 -5 40 -31 75 -57z"/>
                            <path d="M425 1425 c-44 -36 -85 -77 -92 -92 -10 -23 -54 -166 -79 -255 -9
                            -32 -22 -19 -39 40 -8 31 -21 70 -28 85 l-13 29 -44 -36 c-25 -20 -62 -50 -82
                            -67 l-38 -30 0 -314 0 -313 77 -46 c42 -25 80 -43 85 -40 4 3 8 103 9 222 0
                            120 4 206 8 191 18 -58 30 -69 72 -69 29 0 41 5 45 18 16 49 27 72 35 72 5 0
                            8 -120 7 -274 l-3 -274 30 -17 c94 -55 139 -75 146 -68 13 13 7 1296 -6 1299
                            -5 1 -46 -26 -90 -61z"/>
                        </g>
                    </svg>
                </a>
                <dark-mode-toggler class="md:hidden"></dark-mode-toggler>
                <i @click="toggleNavbar" class="
                    fas fa-bars
                    cursor-pointer
                    text-3xl hover:text-gray-dark dark:hover:text-gray-lightest
                    px-2 h-min
                    md:hidden"
                ></i>
            </div>
            <!-- menu à afficher quand l'écran est grand -->
            <div class="hidden md:flex">
                <a v-for="item in items" :href="item.url" class="px-3 py-2 hover:text-gray-dark dark:hover:text-gray-very-lightest">
                    <i :class="item.icon"></i>
                    <span class="ml-2">{{item.name}}</span>
                </a>
                <dark-mode-toggler class="mx-2"></dark-mode-toggler>
            </div>
            <!-- menu à afficher quand l'écran est petit -->
            <div
                :class="showMenu ? 'max-h-56' : 'max-h-0 overflow-hidden'"
                class="flex flex-col md:hidden w-full transition-all duration-200 ease-out shadow-lg"
            >
                <a v-for="item in items" :href="item.url" class="py-3 text-center border-t border-white hover:bg-black dark:hover:bg-white hover:bg-opacity-5 dark:hover:bg-opacity-5">
                    <i :class="item.icon"></i>
                    <span class="ml-2">{{item.name}}</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="h-16"></div>
</template>
  
<script>
import DarkModeToggler from './DarkModeToggler.vue'

export default {
    name: "navbar",
    components: {
        DarkModeToggler
    },
    props: {
        urlHome: String,
        items: Array
    },
    data() {
        return {
            showMenu: false
        }
    },
    methods: {
        toggleNavbar: function(){
            this.showMenu = !this.showMenu;
        }
    }
}
</script>
  