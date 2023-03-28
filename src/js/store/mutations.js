export default {
    mutatePage: (state, payload) => {
        state.page = payload
    },
    mutateClans: (state, payload) => {
        state.clans = payload
    },
    mutateIsClanView: (state, payload) => {
        state.isClanView = payload
    },
    mutateClanDetails: (state, payload) => {
        state.clanDetails = payload
    },
    mutateIsDetailsLoading: (state, payload) => {
        state.isDetailsLoading = payload
    }
}