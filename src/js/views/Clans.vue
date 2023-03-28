<template>
    <div class="flex relative">
        <ClanList :class="[ getIsClanView ? 'w-8/12' : 'w-full' ]" />
        <ClanDetails class="overflow-hidden sticky top-0 h-full" :class="[ getIsClanView ? 'w-4/12' : 'w-0' ]" />
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import ClanList from '../components/ClanList'
import ClanDetails from '../components/ClanDetails'

export default {
    name: 'Clans',
    components: {
        ClanList,
        ClanDetails
    },
    computed: {
        ...mapGetters([
            'getIsClanView'
        ])
    },
}
</script>