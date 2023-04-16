<template>
    <div class="m-3">
        <template v-if="this.person">
            Id: {{ this.person.id }}
            Name: {{ this.person.name }} <br>
            Age: {{ this.person.age }} <br>
            Job title: {{ this.person.job_title }}
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
        methods: {
            getPerson() {
                axios.get(`/api/persons/show/${this.$route.params.person}`)
                    .then(response => {
                        this.person = response.data;
                    })
            }
        },
        mounted() {
            this.getPerson();
        }
    }
</script>
