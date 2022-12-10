<template>
    <nav :class="showMenu ? 'md:pb-1' : 'pb-1'" class="flex flex-wrap items-center justify-between px-2 pt-1 bg-gray-darkest border-b border-white">
        <div class="w-full relative flex justify-between md:w-auto ml-2 items-center mb-1 md:mb-0">
            <a :href="auth ? urlLeagues : urlHome">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                    width="192.000000pt" height="184.000000pt"
                    viewBox="0 0 192.000000 184.000000" preserveAspectRatio="xMidYMid meet"
                    class="w-14 h-14 fill-white hover:fill-gray-lightest"
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
            <i @click="toggleNavbar" class="
                fas fa-bars
                cursor-pointer
                text-3xl hover:text-gray-lightest
                px-2 h-min
                md:hidden"
            ></i>
        </div>
        <div :class="{'hidden': !showMenu, 'flex': showMenu}" class="
            md:flex flex-col md:flex-row
            w-full md:w-auto
        ">
            <a v-if="!auth" class="px-3 py-2 text-lg font-bold hover:text-gray-lightest" :href="urlHome">
                <i class="fa-solid fa-house"></i>
                <span class="ml-2">Accueil</span>
            </a>
            <a v-if="auth" :href="urlLeagues" class="
                md:px-3 py-3 md:py-2 -mx-2 md:mx-0
                text-lg font-bold md:hover:text-gray-lightest text-center
                border-t border-white md:border-t-0
                hover:bg-white hover:bg-opacity-5 md:hover:bg-gray-darkest"
            >
                <i class="fa-solid fa-table"></i>
                <span class="ml-2">Mes ligues</span>
            </a>
            <a v-if="auth" :href="urlLogout" class="
                md:px-3 py-3 md:py-2 -mx-2 md:mx-0 
                text-lg font-bold md:hover:text-gray-lightest text-center
                border-t border-white md:border-t-0
                hover:bg-white hover:bg-opacity-5 md:hover:bg-gray-darkest"
            >
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="ml-2">Déconnexion</span>
            </a>
        </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: "navbar",
    props: {
        auth: Boolean,
        urlHome: String,
        urlLeagues: String,
        urlLogout: String
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
  