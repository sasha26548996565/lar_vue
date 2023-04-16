<template>
    <div class="m-3">
        <template v-if="person">
            Id: {{ person.id }}
            Name: {{ person.name }} <br>
            Age: {{ person.age }} <br>
            Job title: {{ person.job_title }}
        </template>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                person: null
            }
        },
        mounted() {
            this.$store.dispatch('getPerson', this.$route.params.person);
        },
        computed: {
            person() {
                return this.$store.getters.person;
            }
        },
    }
</script>
