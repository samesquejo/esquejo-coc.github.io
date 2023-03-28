<template>
    <body-layout />
    <sidebar-layout />
</template>

<script>
import { mapActions } from 'vuex'
import BodyLayout from './components/BodyLayout'
import SidebarLayout from './components/SidebarLayout'

export default {
    name: 'AppMain',
    components: {
        BodyLayout,
        SidebarLayout
    },
    mounted() {
        const location = window.location
        this.setPage(location.pathname)
    },
    methods: {
        ...mapActions([
            'setPage'
        ])
    }
}
</script>
