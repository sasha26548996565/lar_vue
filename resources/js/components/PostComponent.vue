<template>
    <AboutComponent ref="about"></AboutComponent>
    <div>
        post component
        <CreatePostComponent :obj="obj" ref="createPost"></CreatePostComponent>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Job title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="person in persons" :key="person.id">
                    <ShowComponent :person="person"></ShowComponent>
                    <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    import AboutComponent from './AboutComponent.vue';
    import CreatePostComponent from './CreatePostComponent.vue';
    import EditComponent from './EditComponent.vue';
    import ShowComponent from './ShowComponent.vue';

    export default {
        data() {
            return {
                persons: null,
                editPersonId: null,
                name: '',
                age: null,
                job_title: '',
                deletingPersonId: null,
                obj: {
                    isPublished: false
                }
            }
        },
        methods: {
            getPersons() {
                axios.get('/api/persons')
                    .then(response => {
                        this.persons = response.data;
                    })
            },
            changePersonProperties(id, name, age, job_title) {
                this.editPersonId = id;
                let refName = `edit_${id}`;
                this.$refs[refName][0].name = name;
                this.$refs[refName][0].age = age;
                this.$refs[refName][0].job_title = job_title;
            },
            isCurrentPerson(id) {
                return this.editPersonId == id;
            },
            updatePerson(id) {
                axios.patch(`/api/persons/update/${id}`, {name: this.name, age: this.age, job_title: this.job_title})
                    .then(response => {
                        this.editPersonId = null;
                        this.getPersons();
                    })
            },
            deletePerson(id) {
                axios.delete(`api/persons/delete/${id}`, {id: id})
                    .then(response => {
                        this.getPersons();
                    })
            },
            isCurrentPersonDelete(id) {
                return this.deletingPersonId == id;
            },
            changeDeletePersonId(id) {
                this.deletingPersonId = id;
            },
            logPostComponent() {
                return 'this is post component';
            }
        },
        mounted() {
            this.getPersons();
            console.log(this.$refs.createPost.logCreatePostComponent());
        },
        components: {
            CreatePostComponent,
            AboutComponent,
            EditComponent,
            ShowComponent
        }
    }
</script>

<style scoped>

</style>
