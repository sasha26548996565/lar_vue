<template>
    <div>
        {{ obj.isPublished }}
        <div class="block-form mt-3">
            <div class="form-group mt-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" v-model="name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group mt-2">
                <label for="age">Age</label>
                <input type="number" class="form-control" v-model="age" id="age" placeholder="Enter age">
            </div>
            <div class="form-group mt-2">
                <label for="job_title">Job title</label>
                <input type="text" class="form-control" v-model="job_title" id="job_title" placeholder="Enter job title">
            </div>
            <button type="submit" @click.prevent="addPerson" class="btn btn-primary mt-2">Submit</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                age: null,
                job_title: null
            }
        },
        props: [
            'obj'
        ],
        methods: {
            addPerson() {
                axios.post('api/persons/store', {name: this.name, age: this.age, job_title: this.job_title})
                    .then(response => {
                        this.name = null;
                        this.age = null;
                        this.job_title = null;
                    })
                    .catch(error => console.log(error))
            },
            logCreatePostComponent() {
                return 'this create post component';
            }
        },
        mounted() {
            console.log(this.$parent.logPostComponent());
            console.log(this.$parent.$refs.about.aboutComponentDesc());
        }
    }
</script>

<style scoped>

</style>
