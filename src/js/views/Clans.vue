<template>
    <div class="flex relative">
        <ClanList :class="[ getIsClanView ? 'w-7/12' : 'w-full' ]" />
        <ClanDetails class="overflow-hidden sticky top-0 h-full" :class="[ getIsClanView ? 'w-5/12 !px-2' : 'w-0 !px-0' ]" />
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