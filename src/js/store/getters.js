export default {
    getPage: (state) => state.page,
    getPageName: (state) => {
        switch (state.page) {
            case '/':
                state.pageName = 'Dashboard'
                break;
            case '/clans':
                state.pageName = 'Clans'
                break;
        }
        return state.pageName
    },
    getClans: (state) => state.clans,
    getIsClanView: (state) => state.isClanView,
    getClanDetails: (state) => state.clanDetails,
    getIsDetailsLoading: (state) => state.isDetailsLoading
}