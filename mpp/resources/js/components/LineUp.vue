<template>
    <div class="flex justify-center">
        <div class="w-[24rem] z-10 h-[23rem] rounded text-gray-darkest">
            <div class="absolute ml-16 mt-12 text-center w-20">
                <button class="btn-secondary w-12 px-0" @click="showSelectionModal('Pivot')">P</button>
                <p class="bg-white font-bold mt-1 border rounded" v-if="center">{{ center.name }}</p>
                <p class="bg-white font-bold mt-1 border rounded" v-else>???</p>
            </div>
            <div class="absolute ml-60 mt-12 text-center w-20">
                <button class="btn-secondary w-12 px-0" @click="showSelectionModal('Ailier Fort')">ALF</button>
                <p class="bg-white font-bold mt-1 border rounded" v-if="powerForward">{{ powerForward.name }}</p>
                <p class="bg-white font-bold mt-1 border rounded" v-else>???</p>
            </div>
            <div class="absolute ml-4 mt-48 text-center w-20">
                <button class="btn-secondary w-12 px-0" @click="showSelectionModal('Arrière')">AR</button>
                <p class="bg-white font-bold mt-1 border rounded" v-if="shootingGuard">{{ shootingGuard.name }}</p>
                <p class="bg-white font-bold mt-1 border rounded" v-else>???</p>
            </div>
            <div class="absolute ml-[151px] mt-56 text-center w-20">
                <button class="btn-secondary w-12 px-0" @click="showSelectionModal('Meneur')">M</button>
                <p class="bg-white font-bold mt-1 border rounded" v-if="pointGuard">{{ pointGuard.name }}</p>
                <p class="bg-white font-bold mt-1 border rounded" v-else>???</p>
            </div>
            <div class="absolute ml-72 mt-48 text-center w-20">
                <button class="btn-secondary w-12 px-0" @click="showSelectionModal('Ailier')">AL</button>
                <p class="bg-white font-bold mt-1 border rounded" v-if="smallForward">{{ smallForward.name }}</p>
                <p class="bg-white font-bold mt-1 border rounded" v-else>???</p>
            </div>
        </div>
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="absolute w-[24rem] bg-white"
            viewBox="0 0 500.000000 472.000000"
            preserveAspectRatio="xMidYMid meet"
        >
            <g transform="translate(0.000000,472.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                <path d="M0 2355 l0 -2355 2500 0 2500 0 0 2355 0 2355 -2500 0 -2500 0 0
                -2355z m300 1645 l0 -680 45 -101 c202 -456 553 -840 1003 -1098 224 -129 495
                -223 787 -273 174 -29 530 -32 704 -5 788 124 1433 597 1787 1311 l64 130 0
                698 0 698 140 0 140 0 0 -1220 0 -1220 -130 0 c-123 0 -130 -1 -130 -20 0 -19
                7 -20 130 -20 l130 0 0 -1080 0 -1080 -927 2 -928 3 -8 63 c-23 191 -150 374
                -322 464 -94 49 -174 68 -285 68 -196 0 -367 -81 -483 -229 -78 -99 -107 -172
                -132 -333 l-6 -38 -924 0 -925 0 0 1080 0 1079 137 3 c122 3 138 5 141 21 3
                15 -9 17 -137 17 l-141 0 0 1220 0 1220 135 0 135 0 0 -680z m1090 545 c0
                -113 2 -135 15 -135 13 0 15 22 15 135 l0 135 135 0 135 0 0 -945 0 -945 95 0
                94 0 6 -37 c11 -77 47 -190 77 -243 49 -87 171 -201 261 -244 191 -92 408 -85
                587 20 161 94 278 271 297 447 l6 57 93 0 94 0 0 945 0 945 140 0 140 0 0
                -135 c0 -113 2 -135 15 -135 13 0 15 22 15 135 l0 135 525 0 525 0 -2 -697 -3
                -698 -58 -114 c-159 -314 -358 -568 -615 -783 -330 -277 -763 -462 -1212 -520
                -124 -16 -429 -15 -550 1 -514 69 -968 287 -1333 641 -207 200 -344 387 -475
                649 l-77 154 -3 641 c-2 352 -1 660 3 683 l6 43 525 0 524 0 0 -135z m1878
                -792 l-3 -928 -75 0 -75 0 -8 65 c-9 69 -15 83 -34 72 -9 -5 -9 -19 -3 -47 5
                -22 10 -52 10 -67 l0 -28 -581 0 -581 0 3 67 c3 44 0 67 -8 70 -11 4 -16 -12
                -28 -94 l-7 -43 -74 0 -74 0 0 930 0 930 770 0 770 0 -2 -927z m-188 -985 c0
                -13 -7 -52 -15 -87 -47 -196 -212 -368 -410 -427 -81 -24 -230 -24 -310 0
                -229 69 -397 261 -422 484 l-6 52 582 0 581 0 0 -22z m-445 -2173 c137 -35
                280 -138 355 -255 40 -62 77 -168 86 -243 l7 -57 -180 0 -179 0 -12 43 c-27
                100 -95 158 -192 165 -71 5 -120 -10 -167 -51 -38 -34 -72 -97 -73 -134 0 -23
                0 -23 -180 -23 l-180 0 0 38 c0 108 71 261 165 357 85 86 188 142 300 165 67
                13 188 11 250 -5z m-60 -394 c62 -29 105 -86 105 -142 0 -18 -9 -19 -186 -19
                l-186 0 7 33 c25 114 153 177 260 128z"/>
                <path d="M2210 4290 c0 -19 7 -20 94 -20 l94 0 -20 -37 c-14 -27 -17 -49 -13
                -76 11 -77 59 -117 141 -117 41 0 51 5 85 39 35 34 39 44 39 88 0 28 -6 58
                -15 69 -8 10 -15 22 -15 27 0 4 43 7 95 7 88 0 95 1 95 20 0 20 -7 20 -290 20
                -283 0 -290 0 -290 -20z m341 -30 c23 -13 49 -61 49 -90 0 -12 -7 -35 -17 -50
                -52 -88 -183 -52 -183 50 0 76 83 126 151 90z"/>
                <path d="M2420 3403 c0 -16 9 -18 72 -16 58 1 74 5 76 17 3 13 -9 16 -72 16
                -66 0 -76 -2 -76 -17z"/>
                <path d="M2211 3350 c-66 -36 -63 -34 -55 -53 5 -13 12 -12 52 12 26 15 55 30
                65 34 19 7 19 28 1 34 -5 1 -33 -11 -63 -27z"/>
                <path d="M2700 3368 c0 -12 101 -72 124 -73 27 -1 12 27 -26 49 -57 33 -98 43
                -98 24z"/>
                <path d="M2936 3211 c-8 -12 65 -120 81 -121 24 0 20 17 -16 70 -38 55 -55 68
                -65 51z"/>
                <path d="M2018 3193 c-9 -10 -27 -37 -42 -61 -23 -36 -24 -43 -11 -48 9 -4 17
                -5 19 -3 59 84 76 112 71 119 -9 15 -20 12 -37 -7z"/>
            </g>
        </svg>
    </div>
    <div v-if="dataChanged" class="text-center">
        <button v-if="pointGuard && shootingGuard && smallForward && powerForward && center && !loading && isDateValid()" class="btn-primary w-96" @click="save">Enregistrer</button>
        <button v-else class="btn-disabled w-96">Enregistrer</button>
        <p class="italic text-xs mt-1">[L'enregistrement est possible uniquement Lundi, Mardi et Mercredi]</p>
    </div>
    <basketballer-selection-modal
        v-if="selectionModalShown"
        :basketballers="selectionModalBasketballers"
        @cancel="selectionModalShown = false"
        @select="select"
    ></basketballer-selection-modal>
</template>

<script>
import BasketballerSelectionModal from './BasketballerSelectionModal.vue'

export default {
    components: {
        BasketballerSelectionModal
    },
    props: {
        urlBrowseBasketballerPlayer: String,
        urlSaveLineUp: String,
        urlBrowseLineUp: String,
        leagueId: Number
    },
    data() {
        return {
            loading: true,
            basketballers: [],
            pointGuard: null, // Meneur
            shootingGuard: null, // Arrière
            smallForward: null, // Ailier
            powerForward: null, // Ailier Fort
            center: null, // Pivot
            selectionModalShown: false,
            selectionModalBasketballers: '',
            lastClickedPosition: '',
            dataChanged: false,
        }
    },
    methods: {
        isDateValid() {
            const date = new Date()
            const day = ((date.getDay()+6)%7)
            return day <= 2
        },
        async loadBasketballerPlayer() {
            await axios
            .post(this.urlBrowseBasketballerPlayer, {
                league_id: this.leagueId
            })
            .then(response => (
                this.basketballers = response.data
            ))
        },
        async loadLineUp() {
            await axios
            .post(this.urlBrowseLineUp, {
                league_id: this.leagueId
            })
            .then((response) => {
                this.pointGuard = response.data.pointGuard
                this.shootingGuard = response.data.shootingGuard
                this.smallForward = response.data.smallForward
                this.powerForward = response.data.powerForward
                this.center = response.data.center
            })
        },
        async save() {
            if (!this.loading) {
                this.loading = true
                await axios
                .post(this.urlSaveLineUp, {
                    league_id: this.leagueId,
                    point_guard: this.pointGuard.id,
                    shooting_guard: this.shootingGuard.id,
                    small_forward: this.smallForward.id,
                    power_forward: this.powerForward.id,
                    center: this.center.id
                })
                this.dataChanged = false
                this.loading = false
            }
        },
        select (basketballerId) {
            const basketballer = this.basketballers.filter((basketballer) => {
                return basketballer.id == basketballerId
            })[0]
            if (this.lastClickedPosition == "Ailier") {
                this.smallForward = basketballer
            }
            if (this.lastClickedPosition == "Ailier Fort") {
                this.powerForward = basketballer
            }
            if (this.lastClickedPosition == "Arrière") {
                this.shootingGuard = basketballer
            }
            if (this.lastClickedPosition == "Meneur") {
                this.pointGuard = basketballer
            }
            if (this.lastClickedPosition == "Pivot") {
                this.center = basketballer
            }
            this.selectionModalShown = false
            this.dataChanged = true
        },
        showSelectionModal(position) {
            this.lastClickedPosition = position
            this.selectionModalBasketballers = this.basketballers.filter((basketballer) => {
                return (basketballer.position == position || basketballer.position == 'Flexible') &&
                    basketballer.id != this.pointGuard?.id && 
                    basketballer.id != this.shootingGuard?.id &&
                    basketballer.id != this.smallForward?.id &&
                    basketballer.id != this.powerForward?.id &&
                    basketballer.id != this.center?.id
            })
            this.selectionModalShown = true
        },
    },
    async mounted() {
        this.loading = true
        await this.loadBasketballerPlayer()
        await this.loadLineUp()
        this.loading = false
    },
}
</script>
