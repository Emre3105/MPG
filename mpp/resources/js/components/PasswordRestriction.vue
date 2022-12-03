<template>
    <span class="text-gray-light font-medium italic" @mouseover="(show = !show)" @mouseleave="(show = !show)">?</span>
    <div v-show="show" class="text-gray fixed ml-28 -mt-[7.5rem] bg-white text-sm p-2 shadow-xl rounded">
        <ul>
            <li>Minimum 8 caractères</li>
            <li>Au moins une majuscule et une minuscule</li>
            <li>Au moins une lettre et un chiffre</li>
            <li>Au moins un caractère spécial</li>
            <li>Ne doit pas être compromis</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false
        }
    }
}
</script>