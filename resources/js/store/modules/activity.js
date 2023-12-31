const state = {
    activities: [],
}

const getters = {}

const actions = {
    getActivity(context) {
        context.commit('setActivity')
    }
}

const mutations = {
    setActivity(state) {
        axios.get('activity_list').then(response => {
            state.activities = response.data.activities
        });
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
