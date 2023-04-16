<template>
    <div class="w-25 m-3">
        <input type="text" v-model="name" class="form-control mb-2" placeholder="name">
        <input type="number" v-model="age" class="form-control mb-2" placeholder="age">
        <input type="text" v-model="job_title" class="form-control mb-2" placeholder="job_title">
        <input type="button" @click.prevent="update()" class="btn btn-success" value="update">
    </div>
</template>

<script>
    import router from '../../router.js';
    export default {
        data() {
            return {
                name: '',
                age: null,
                job_title: ''
            }
        },
        methods: {
            getPerson() {
                axios.get(`/api/persons/show/${this.$route.params.person}`)
                    .then(response => {
                        this.name = response.data.name;
                        this.age = response.data.age;
                        this.job_title = response.data.job_title;
                    })
            },
            update() {
                axios.patch(`/api/persons/update/${this.$route.params.person}`, {name: this.name, age: this.age, job_title: this.job_title})
                    .then(response => {
                        router.push({name: 'person.show', params: {person: this.$route.params.person}})
                    })
            }
        },
        mounted() {
            this.getPerson();
        }
    }
</script>
