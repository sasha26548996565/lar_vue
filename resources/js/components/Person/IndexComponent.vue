<template>
    <div>
        All posts
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">age</th>
                    <th scope="col">job title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="person in persons" :key="person.id">
                    <th scope="row">{{ person.id }}</th>
                    <td><router-link :to="{name: 'person.show', params: {person: person.id}}">{{ person.name }}</router-link></td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job_title }}</td>
                    <td><router-link class="btn btn-warning" :to="{name: 'person.edit', params: {person: person.id}}">edit</router-link></td>
                    <td><a @click.prevent="deletePerson(person.id)" class="btn btn-danger">delete</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                persons: null
            }
        },
        methods: {
            getPersons() {
                axios.get('/api/persons')
                    .then(response => {
                        this.persons = response.data;
                    })
            },
            deletePerson(id) {
                axios.delete(`/api/persons/delete/${id}`)
                    .then(response => {
                        this.getPersons();
                    })
            }
        },
        mounted() {
            this.getPersons();
        },
    }
</script>

<style scoped>

</style>
