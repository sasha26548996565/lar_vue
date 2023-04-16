<template>
    <div>
        <router-link :to="{ name: 'person.index' }">Persons</router-link>
        <router-link :to="{ name: 'person.create' }">Create Person</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
    export default
    {

    }
</script>

<style scoped>

</style>
