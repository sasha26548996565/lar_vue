<template>
    <tr :class="this.$parent.isCurrentPerson(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td><input v-model="name" class="form-control" type="text"></td>
        <td><input v-model="age" class="form-control" type="number"></td>
        <td><input v-model="job_title" class="form-control" type="text"></td>
        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
    </tr>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                age: null,
                job_title: '',
            }
        },
        props: [
            'person'
        ],
        methods: {
            updatePerson(id) {
                axios.patch(`/api/persons/update/${id}`, {name: this.name, age: this.age, job_title: this.job_title})
                    .then(response => {
                        this.$parent.editPersonId = null;
                        this.$parent.getPersons();
                    })
            },
        },
    }
</script>

<style scoped>

</style>
