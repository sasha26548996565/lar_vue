import router from '../../router.js';

const state = {
    person: {
        name: '',
        age: null,
        job_title: ''
    },
    persons: null
}

const getters = {
    person: state => state.person,
    persons: state => state.persons,
    isDisabled: state => state.person.name && state.person.age && state.person.job_title
}

const actions = {
    getPerson({state, commit, dispatch}, person) {
        axios.get(`/api/persons/show/${person}`)
            .then(response => {
                commit('setPerson', response.data.data);
            })
    },
    getPersons({commit}) {
        axios.get('/api/persons')
            .then(response => {
                commit('setPersons', response.data.data);
            })
    },
    deletePerson({dispatch}, id) {
        axios.delete(`/api/persons/delete/${id}`)
            .then(response => {
                dispatch('getPersons');
            })
    },
    update({}, data) {
        axios.patch(`/api/persons/update/${data.id}`, {name: data.name, age: data.age, job_title: data.job_title})
            .then(response => {
                router.push({name: 'person.show', params: {person: data.id}})
            })
    },
    create({}, data) {
        axios.post('/api/persons/store', {name: data.name, age: data.age, job_title: data.job_title})
            .then(response => {
                router.push({name: 'person.index'})
            })
    }
}

const mutations = {
    setPerson(state, person) {
        state.person = person;
    },
    setPersons(state, persons) {
        state.persons = persons;
    }
}

export default {
    state, getters, actions, mutations
}
