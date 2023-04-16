const state = {
    person: null
}

const getters = {
    person: state => {
        return state.person;
    }
}

const actions = {
    getPerson({state, commit, dispatch}, person) {
        axios.get(`/api/persons/show/${person}`)
            .then(response => {
                commit('setPerson', response.data.data);
            })
    }
}

const mutations = {
    setPerson(state, person) {
        state.person = person;
    }
}

export default {
    state, getters, actions, mutations
}
