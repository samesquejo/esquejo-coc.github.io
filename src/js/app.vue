<template>
    <header-layout />
    <body-layout />
</template>

<script>
import { mapActions } from 'vuex'
import HeaderLayout from './components/HeaderLayout'
import BodyLayout from './components/BodyLayout'

export default {
    name: 'AppMain',
    components: {
        HeaderLayout,
        BodyLayout
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
