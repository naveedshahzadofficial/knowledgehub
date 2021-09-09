const state = {
    user: "",
    isAdmin: false,
    isSupervisor: false
}

const getters = {}

const actions = {
    user(context) {
        context.commit('user')
    },
    isAdmin(context) {
        context.commit('isAdmin')
    },
    isSupervisor(context) {
        context.commit('isSupervisor')
    },
    logout(context) {
        context.commit('logout')
    }
}

const mutations = {
    user(state) {
        axios.get('user/details').then(response => {
            state.user = response.data.user
        })
    },
    isAdmin(state) {
        axios.get('admin').then(response => state.isAdmin = response.data)
    },
    isSupervisor(state) {
        axios.get('supervisor').then(response => state.isSupervisor = response.data)
    },
    logout() {
        axios.post('logout').then( () => {
            localStorage.removeItem("authToken");
            swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'logout successfully',
                showConfirmButton: false,
                timer: 1500
            })
            // this.$router.push({name: 'home'});
            window.location.replace('/')
        })
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
