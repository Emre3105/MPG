<template>
    <div class="flex mb-8">
        <input class="form-text-input w-full rounded-r-none focus:outline-none" type="text" placeholder="Rechercher" v-model="filter" @change="load('')">
        <div class="bg-cyan rounded-r-md flex items-center px-2">
            <i class="fa-solid fa-magnifying-glass text-2xl"></i>
        </div>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr class="table-head">
                    <th v-for="item in columns">
                        <div class="flex justify-center items-center cursor-pointer space-x-2" @click="load(item.column_name)">
                            <span>{{item.display_name}}</span>
                            <i v-if="selectedColumn == item.column_name && selectedDirection == 'asc'" class="fa-solid fa-caret-up"></i>
                            <i v-if="selectedColumn == item.column_name && selectedDirection == 'desc'" class="fa-solid fa-caret-down"></i>
                        </div>
                    </th>
                    <th v-if="transferMarket"></th>
                </tr>
            </thead>
            <tbody v-if="!loading">
                <tr v-for="(item, key) in data" :class="key % 2 == 0 ? 'table-primary' : 'table-secondary'">
                    <th>{{ item.name }}</th>
                    <td>{{ item.team }}</td>
                    <td>{{ item.position }}</td>
                    <td>{{ item.odds }}</td>
                    <td v-if="transferMarket"><i class="fa-solid fa-circle-plus cursor-pointer text-2xl" @click="addBid(item.id)"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-if="loading" class="flex justify-center my-10">
        <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray animate-spin fill-cyan" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
    </div>
</template>

<script>
export default {
    emits: ['addBid', 'remove'],
    props: {
        urlBrowse: String,
        transferMarket: {
            type: Boolean,
            default: false
        },
        selectedBasketballerIds: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            loading: false,
            data: null,
            columns: [
                {
                    display_name: 'Nom',
                    column_name: 'name'
                }, {
                    display_name: 'Équipe',
                    column_name: 'team'
                }, {
                    display_name: 'Poste',
                    column_name: 'position'
                }, {
                    display_name: 'Côte',
                    column_name: 'odds'
                }
            ],
            selectedColumn: '',
            selectedDirection: 'desc',
            filter: ''
        }
    },
    methods: {
        async load(column) {
            if (!this.loading) {
                this.loading = true
    
                if (this.selectedColumn == column) {
                    this.selectedDirection == 'asc' ? this.selectedDirection = 'desc' : this.selectedDirection = 'asc'
                }
                if (column != '') {
                    this.selectedColumn = column
                }
    
                await axios
                    .post(this.urlBrowse, {
                        column: this.selectedColumn,
                        direction: this.selectedDirection,
                        filter: this.filter
                    })
                    .then(response => (
                        this.data = response.data
                    ))
                
                this.loading = false
            }
        },
        addBid(basketballerId) {
            this.$emit('addBid', basketballerId)
        }
    },
    mounted() {
        this.load('odds')
    },
}
</script>
