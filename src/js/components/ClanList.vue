<template>
    <body-content>
        <table-panel>
            <table-panel-header>
                <div class="flex items-center">
                    <h3 class="font-semibold text-lg text-indigo-400 mb-0">Clan List</h3>
                    <form @submit.prevent="searchClan()" class="ml-auto ">
                        <OInput
                            class="!mb-0"
                            :placeholder="'Search Name'"
                            v-model="search"
                        />
                    </form>
                    <!-- <o-button
                        mode="fill"
                        :isIcon="true"
                        size="sm"
                        class="ml-2"
                        @click="searchClan()"
                    >
                        Search
                    </o-button> -->
                </div>
            </table-panel-header>
            <o-table>
                <thead>
                    <tr>
                        <o-th>Clan</o-th>
                        <o-th>War</o-th>
                        <o-th>Points</o-th>
                        <o-th></o-th>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="!isLoading && searchStart && getClans.length">
                        <tr v-for="(clan, key) in getClans" :key="key">
                            <o-td class="flex items-center">
                                <img :src="clan.badgeUrls.small" class="h-14 w-14 rounded-full drop-shadow-lg" alt="...">
                                <ul class="ml-4 flex flex-col">
                                    <li class="font-bold text-base mb-2 text-emerald-500 flex items-center">
                                        <span>{{ clan.name }}</span>
                                        <span class="text-xs text-indigo-300 ml-2 border border-indigo-300 rounded-full px-2 py-0.5">
                                            {{ clan.clanLevel }}
                                        </span>
                                    </li>
                                    <li class="mb-4 text-purple-300">{{ clan.tag }}</li>
                                    <li class="flex mb-4">
                                        <div class="text-base text-lime-400 flex items-center border border-2 border-lime-400 px-3 py-1 rounded-full">
                                            <span class="mr-2">{{ clan.members }}</span>
                                            <i class="fas fa-users text-sm"></i>
                                        </div>
                                    </li>
                                    <li class="flex items-center">
                                        <figure v-if="clan.location && clan.location.isCountry" class="h-8 w-8 rounded-full border border-2 border-teal-400 overflow-hidden drop-shadow-lg mr-1">
                                            <img :src="getCountryFlag(clan.location.countryCode)" class="w-full h-full  object-cover scale-105">
                                        </figure>
                                        <figure
                                            class="h-8 w-8 rounded-full border border-2 border-teal-400 overflow-hidden drop-shadow-lg mr-1"
                                            v-for="(label, labelKey) in clan.labels"
                                            :key="labelKey"
                                        >
                                            <img :src="label.iconUrls.small" class="w-full h-full  object-cover scale-105" :alt="label.name">
                                        </figure>
                                    </li>
                                </ul>
                            </o-td>
                            <o-td>
                                <div class="flex mb-4">
                                    <span class="text-base mr-2 text-yellow-300"><i class="fa fa-medal"></i> </span>
                                    <span class="text-base text-emerald-400 font-bold">{{ clan.warWins }}</span>
                                </div>
                                <div class="flex w-[250px] flex-wrap">
                                    <o-chip class="mr-1 mb-1" color="teal">streak: {{ clan.warWinStreak }}</o-chip>
                                    <o-chip class="mr-1 mb-1" color="blue">fqz: {{ clan.warFrequency }}</o-chip>
                                    <o-chip class="mr-1 mb-1" color="red">Loss: {{ clan.warLosses ?? 0 }}</o-chip>
                                    <o-chip class="mr-1 mb-1" color="yellow">ties: {{ clan.warTies ?? 0 }}</o-chip>
                                    <o-chip class="mr-1 mb-1" color="purple">league: {{ clan.warLeague.name }}</o-chip>
                                    <o-chip class="mr-1 mb-1" color="green">cap: {{ clan.capitalLeague.name }}</o-chip>
                                </div>
                                <!-- <ul class="flex flex-col">
                                    <li class="mb-1">
                                        <span class="text-base mr-1 text-yellow-300"><i class="fa fa-medal"></i> </span>
                                        <span class="text-sm text-emerald-400 font-bold">{{ clan.warWins }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-xs ">Streak: </span>
                                        <span class="text-sm text-emerald-400 font-bold">{{ clan.warWinStreak }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-xs ">Frequency: </span>
                                        <span class="text-sm text-emerald-400 font-bold">{{ clan.warFrequency}}</span>
                                    </li>
                                </ul> -->
                            </o-td>
                            <o-td>
                                <ul class="flex flex-col">
                                    <li class="mb-1">
                                        <span class="text-xs">Points: </span>
                                        <span class="text-sm text-emerald-400 font-bold">{{ clan.clanPoints}}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-xs ">VS Points: </span>
                                        <span class="text-sm text-emerald-400 font-bold">{{ clan.clanVersusPoints }}</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="text-xs ">Capital Points: </span>
                                        <span class="text-sm text-emerald-400 font-bold">{{ clan.clanCapitalPoints }}</span>
                                    </li>
                                </ul>
                            </o-td>
                            <o-td>
                                <o-button
                                    mode="fill"
                                    :isIcon="true"
                                    size="sm"
                                    class="ml-2"
                                    @click="viewClan(clan.tag)"
                                >
                                    View
                                </o-button>
                            </o-td>
                        </tr>
                    </template>
                    <template v-else-if="isLoading && searchStart">
                        <tr>
                            <o-td class="text-center" colspan="8">
                                <loader></loader>
                            </o-td>
                        </tr>
                    </template>
                    <template v-else-if="searchStart && getClans.length == 0">
                        <tr>
                            <o-td class="text-center" colspan="8">
                                No Result
                            </o-td>
                        </tr>
                    </template>
                    <template v-else-if="!searchStart">
                        <tr>
                            <o-td class="text-center" colspan="8">
                                Search Clan Name
                            </o-td>
                        </tr>
                    </template>
                </tbody>
            </o-table>
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
import OInput from '../components/OInput'
import OButton from '../components/OButton'
import { mapActions, mapGetters } from 'vuex'
import OChip from '../components/OChip'
import Loader from '../components/Loader'
import countryData from '../country.js'

export default {
    name: 'ClanList',
    components: {
        BodyContent,
        TablePanelHeader,
        TablePanel,
        OTable,
        OTh,
        OTd,
        OInput,
        OButton,
        OChip,
        Loader
    },
    data: () => ({
        search: '',
        isLoading: false,
        searchStart: false,
    }),
    computed: {
        ...mapGetters([
            'getClans',
        ])
    },
    methods: {
        ...mapActions([
            'setClans',
            'setIsClanView',
            'setIsDetailsLoading',
            'setClanDetails'
        ]),
        async searchClan() {
            this.searchStart = true
            this.isLoading = true
            await axios.get(`api.php?get=clan&search=${this.search}`)
                .then( req => {
                    const { data } = req
                    if (data.items && data.items.length) {
                        this.setClans(data.items)
                    }
                    this.isLoading = false
                })
        },
        getCountryFlag(code) {
            return countryData[code].image
        },
        async viewClan(tag) {
            this.setIsDetailsLoading(true)
            this.setIsClanView(true)
            const newTag = tag.replace('#','')

            await axios.get(`api.php?get=clanDetails&tag=${newTag}`)
                .then( req => {
                    const { data } = req
                    this.setIsDetailsLoading(false)
                    this.setClanDetails(data)
                })
        }
    }
}
</script>