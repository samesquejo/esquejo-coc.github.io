<template>
    <body-content>
        <table-panel class="!px-0">
            <template v-if="!getIsDetailsLoading">
                <div class="overflow-y-auto max-h-[95vh]">

                    <table-panel-header :lessPad="true">
                        <div class="flex items-center">
                            <h3 class="font-semibold text-lg text-indigo-400 mb-0">
                                <span class="text-emerald-500">{{ getClanDetails.name}}</span>
                                <span class="text-xs text-indigo-300 ml-2 border border-indigo-300 rounded-full px-2 py-0.5">
                                    {{ getClanDetails.clanLevel }}
                                </span>
                            </h3>
                            <o-button
                                class="ml-auto"
                                :isIcon="true"
                                size="sm"
                                @click="closeClanDetails()"
                            >
                                <i class="fa fa-times"></i>
                            </o-button>
                        </div>
                    </table-panel-header>
                    <div class="flex flex-wrap justify-center mb-4">
                        <figure class="h-24 w-24 rounded-full overflow-hidden drop-shadow-lg mb-4">
                            <img :src="getClanDetails.badgeUrls?.medium" :alt="getClanDetails.name" class="w-full h-full object-cover">
                        </figure>
                        <h5 class="w-full text-purple-400 text-center mb-6">{{ getClanDetails.tag }}</h5>
                        <div class="flex w-full justify-center mb-4">
                            <figure v-if="getClanDetails.location && getClanDetails.location.isCountry" class="h-10 w-10 rounded-full border border-2 border-teal-400 overflow-hidden drop-shadow-lg mr-1">
                                <img :src="getCountryFlag(getClanDetails.location.countryCode)" class="w-full h-full  object-cover scale-105">
                            </figure>
                            <figure
                                class="h-10 w-10 rounded-full border border-2 border-teal-400 overflow-hidden drop-shadow-lg mr-1"
                                v-for="(label, labelKey) in getClanDetails.labels"
                                :key="labelKey"
                            >
                                <img :src="label.iconUrls.small" class="w-full h-full  object-cover scale-105" :alt="label.name">
                            </figure>
                        </div>
                        <div class="flex flex-wrap">
                            <o-pill
                                class="mr-2 mb-2"
                                color="teal"
                            >
                                <span class="mr-2 font-bold">{{ getClanDetails.clanPoints }}</span>
                                <i class="fas fa-trophy text-sm"></i>
                            </o-pill>
                            <o-pill
                                class="mr-2 mb-2"
                                color="yellow"
                            >
                                <span class="mr-2 font-bold">{{ getClanDetails.clanVersusPoints }}</span>
                                <i class="fas fa-trophy text-sm"></i>
                            </o-pill>
                        </div>
                    </div>

                    <table-panel-header :lessPad="true">
                        <div class="flex items-center">
                            <h3 class="font-semibold text-lg text-indigo-400 mb-0 mr-2">Capital</h3>
                        </div>
                    </table-panel-header>
                    <div class="flex flex-wrap w-full px-4">
                        <o-pill class="mr-2 mb-2" color="yellow" size="sm">
                            <span class="mr-2 font-bold">{{ getClanDetails.clanCapital?.capitalHallLevel ?? 0 }}</span>
                            <i class="fas fa-vihara text-xs"></i>
                        </o-pill>
                        <o-pill class="mr-2 mb-2" color="red" size="sm">
                            <span>{{ getClanDetails.capitalLeague?.name }}</span>
                        </o-pill>
                        <o-pill
                            class="mr-2 mb-2"
                            color="pink"
                            size="sm"
                            v-for="(disctrict, key) in getClanDetails.clanCapital?.districts"
                            :key="key"
                        >
                            <span>{{ disctrict.name }} Lvl</span>
                            <span class="font-bold ml-2">{{ disctrict.districtHallLevel }}</span>
                        </o-pill>
                        <o-pill class="mr-2 mb-2" color="violet" size="sm">
                            <span class="mr-2 font-bold">{{ getClanDetails.clanCapitalPoints }}</span>
                            <i class="fas fa-splotch text-xs"></i>
                        </o-pill>
                    </div>

                    <table-panel-header :lessPad="true">
                        <div class="flex items-center">
                            <h3 class="font-semibold text-lg text-indigo-400 mb-0 mr-2">Members</h3>
                            <o-pill>
                                <span class="mr-2">{{ getClanDetails.members }}</span>
                                <i class="fas fa-users text-sm"></i>
                            </o-pill>
                        </div>
                    </table-panel-header>

                    <o-table>
                        <thead>
                            <tr>
                                <o-th>Rank</o-th>
                                <o-th>Name</o-th>
                                <o-th></o-th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(member, key) in getClanDetails.memberList"
                                :key="key"
                            >
                                <o-td class="w-[50px] !px-0 !pl-6">
                                    <span class="text-xs text-yellow-300 border border-yellow-300 rounded-full px-2 py-0.5">
                                        {{ member.clanRank }}
                                        <i class="ml-1 fas fa-chess-king text-sm" v-if="member.role == 'leader'"></i>
                                        <i class="ml-1 fas fa-chess-queen text-sm" v-if="member.role == 'coLeader'"></i>
                                        <i class="ml-1 fas fa-chess-knight text-sm" v-if="member.role == 'admin'"></i>
                                        <i class="ml-1 fas fa-chess-pawn text-sm" v-if="member.role == 'member'"></i>
                                    </span>
                                </o-td>
                                <o-td>
                                    <div class="flex items-center">
                                        <span class="text-white text-base mr-4">{{ member.name }}</span>
                                        <figure
                                            class="h-8 w-8 rounded-full overflow-hidden drop-shadow-lg mr-1"
                                        >
                                            <img :src="member.league?.iconUrls?.small" class="w-full h-full  object-cover scale-105" :alt="member.league?.name">
                                        </figure>
                                    </div>
                                </o-td>
                                <o-td>
                                    <div class="flex">
                                        <ul class="flex flex-wrap">
                                            <li class="w-full text-sm text-violet-400">
                                                <span class="mr-2"><i class="fas fa-sun"></i></span>
                                                <span class="font-bold text-white">{{ member.expLevel }}</span>
                                            </li>
                                            <li class="w-full text-sm text-teal-400">
                                                <span class="mr-2"><i class="fas fa-trophy"></i></span>
                                                <span class="font-bold text-white">{{ member.trophies }}</span>
                                            </li>
                                            <li class="w-full text-sm text-yellow-400">
                                                <span class="mr-2"><i class="fas fa-trophy"></i></span>
                                                <span class="font-bold text-white">{{ member.versusTrophies }}</span>
                                            </li>
                                            <li class="w-full text-sm text-lime-400">
                                                <span class="mr-2"><i class="fas fa-hand-holding-medical"></i></span>
                                                <span class="font-bold text-white">{{ member.donations }}</span>
                                            </li>
                                            <li class="w-full text-sm text-red-400">
                                                <span class="mr-2"><i class="fas fa-hand-holding-heart"></i></span>
                                                <span class="font-bold text-white">{{ member.donationsReceived }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </o-td>
                            </tr>
                        </tbody>
                    </o-table>
                </div>
            </template>
            <template v-else>
                <Loader />
            </template>
        </table-panel>

    </body-content>
</template>

<script>
import BodyContent from '../components/BodyContent'
import TablePanelHeader from '../components/TablePanelHeader'
import TablePanel from '../components/TablePanel'
import OTable from '../components/OTable'
import OTh from '../components/OTh'
import OTd from '../components/OTd'
import OButton from '../components/OButton'
import { mapGetters, mapActions } from 'vuex'
import OChip from '../components/OChip'
import countryData from '../country.js'
import Loader from '../components/Loader'
import OPill from '../components/OPill'

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
        Loader,
        OPill
    },
    computed: {
        ...mapGetters([
            'getIsDetailsLoading',
            'getClanDetails',
        ]),
    },
    methods: {
        ...mapActions([
            'setClanDetails',
            'setIsClanView'
        ]),
        closeClanDetails() {
            this.setIsClanView(false)
            this.setClanDetails({})
        },
        getCountryFlag(code) {
            return countryData[code].image
        },
    }
}
</script>