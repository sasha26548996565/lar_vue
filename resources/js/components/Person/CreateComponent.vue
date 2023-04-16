<template>
    <div class="w-25 m-3">
        <input type="text" v-model="name" class="form-control mb-2" placeholder="name">
        <input type="number" v-model="age" class="form-control mb-2" placeholder="age">
        <input type="text" v-model="job_title" class="form-control mb-2" placeholder="job_title">
        <input type="button" :disabled="!isDisabled" @click.prevent="create()" class="btn btn-success" value="Add">
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
            create() {
                axios.post('/api/persons/store', {name: this.name, age: this.age, job_title: this.job_title})
                    .then(response => {
                        router.push({name: 'person.index'})
                    })
            }
        },
        computed: {
            isDisabled() {
                return this.name && this.age && this.job_title;
            }
        }
    }
</script>

<style scoped>

</style>
