<template>
    <div class="card">
        <h3 class="name">{{name}}</h3>
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
    .card {
        padding: 8px;
        border: 2px solid brown;
        background-color: orange;
    }
    .name {
        color: white;
    }
</style>