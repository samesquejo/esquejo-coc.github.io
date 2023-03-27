<template>
    <home v-if="getPage == '/'" />
    <clans v-else-if="getPage.includes('clans') "/>
</template>

<script>
import { mapGetters } from 'vuex'

import Home from '../views/Home'
import Clans from '../views/Clans'

export default {
    name: 'BodyLayout',
    computed: {
        ...mapGetters([
            'getPage'
        ])
    },
    components: {
        Home,
        Clans
    }
}
</script>