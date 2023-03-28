<template>
    <body-content>
        <table-panel class="!px-0">
            <template v-if="!getIsDetailsLoading">
                <table-panel-header>
                    <div class="flex items-center">
                        <h3 class="font-semibold text-lg text-indigo-400 mb-0">Clan Details</h3>
                        <o-button
                            class="ml-auto"
                            :isIcon="true"
                            size="sm"
                        >
                            <i class="fa fa-times"></i>
                        </o-button>
                    </div>
                </table-panel-header>
                <table-panel-header>
                    <div class="flex items-center">
                        <h3 class="font-semibold text-lg text-indigo-400">Members</h3>
                    </div>
                </table-panel-header>
                <o-table>
                    <thead>
                        <tr>
                            <o-th>Clan</o-th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </o-table>
            </template>
            <template v-else>
                <Loader />
            </template>
        </table-panel>
    </body-content>
</template>

<script>
import axios from '../helpers/axios'
import BodyContent from '../components/BodyContent'
import TablePanelHeader from '../components/TablePanelHeader'
import TablePanel from '../components/TablePanel'
import OTable from '../components/OTable'
import OTh from '../components/OTh'
import OTd from '../components/OTd'
import OButton from '../components/OButton'
import { mapGetters } from 'vuex'
import OChip from '../components/OChip'
import countryData from '../country.js'
import Loader from '../components/Loader'

export default {
    name: 'ClanDetails',
    components: {
        BodyContent,
        TablePanelHeader,
        TablePanel,
        OTable,
        OTh,
        OTd,
        OButton,
        OChip,
        Loader
    },
    computed: {
        ...mapGetters([
            'getIsDetailsLoading'
        ])
    }
}
</script>