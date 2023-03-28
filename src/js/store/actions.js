export default {
    setPage: ({commit}, payload) => {
        commit('mutatePage', payload)
    },
    setClans: ({commit}, payload) => {
        commit('mutateClans', payload)
    },
    setIsClanView: ({commit}, payload) => {
        commit('mutateIsClanView', payload)
    },
    setClanDetails: ({commit}, payload) => {
        commit('mutateClanDetails', payload)
    },
    setIsDetailsLoading: ({commit}, payload) => {
        commit('mutateIsDetailsLoading', payload)
    }
}