<template>
    <div class="card">
        <p>Ligue n°{{name}}</p>
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
    }
}
</script>

<style>

</style>
