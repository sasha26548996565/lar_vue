<template>
    <div class="w-25 m-3" v-if="person">
        <input type="text" v-model="person.name" class="form-control mb-2" placeholder="name">
        <input type="number" v-model="person.age" class="form-control mb-2" placeholder="age">
        <input type="text" v-model="person.job_title" class="form-control mb-2" placeholder="job_title">
        <input type="button" :disabled="!isDisabled" @click.prevent="$store.dispatch('update', {
            id: person.id, name: person.name, age: person.age, job_title: person.job_title})" class="btn btn-success" value="update">
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('getPerson', this.$route.params.person);
        },
        computed: {
            isDisabled() {
                return this.$store.getters.isDisabled;
            },
            person() {
                return this.$store.getters.person;
            }
        }
    }
</script>
