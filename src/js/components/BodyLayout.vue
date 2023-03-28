<template>

    <div class="relative md:ml-64 bg-blueGray-50">
        <div class="relative bg-indigo-800 md:pt-12 pb-32 pt-12 px-10">
            <h2 class="text-white">{{ getPageName }}</h2>
        </div>
        
        <home v-if="getPage == '/'" />
        <clans v-else-if="getPage.includes('clans') "/>
        
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

import Home from '../views/Home'
import Clans from '../views/Clans'

export default {
    name: 'BodyLayout',
    computed: {
        ...mapGetters([
            'getPage',
            'getPageName'
        ])
    },
    components: {
        Home,
        Clans
    }
}
</script>