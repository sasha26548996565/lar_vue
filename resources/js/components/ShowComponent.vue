<template>
    <tr :class="this.$parent.isCurrentPerson(person.id) ? 'd-none' : ''">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job_title }}</td>
        <td><a @click.prevent="changePersonProperties(person.id, person.name, person.age, person.job_title)"
            class="btn btn-success">Edit</a></td>
        <td>
            <template v-if="!this.$parent.isCurrentPersonDelete(person.id)">
                <a @click.prevent="this.$parent.changeDeletePersonId(person.id)"
                class="btn btn-danger">Delete</a>
            </template>
            <template v-if="this.$parent.isCurrentPersonDelete(person.id)">
                <span class="">You are sure?</span>
                <a @click.prevent="this.$parent.changeDeletePersonId(null)" class="btn btn-success">Cancel</a>
                <a @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a>
            </template>
        </td>
    </tr>
</template>

<script>
    export default {
        props: [
            'person'
        ],
        methods: {
            changePersonProperties(id, name, age, job_title) {
                this.$parent.editPersonId = id;
                let refName = `edit_${id}`;
                this.$parent.$refs[refName][0].name = name;
                this.$parent.$refs[refName][0].age = age;
                this.$parent.$refs[refName][0].job_title = job_title;
            },
            deletePerson(id) {
                axios.delete(`api/persons/delete/${id}`, {id: id})
                    .then(response => {
                        this.$parent.getPersons();
                    })
            },
        },
    }
</script>

<style scoped>

</style>
