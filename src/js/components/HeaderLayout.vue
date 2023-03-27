<template>
    <nav class="bg-blue-500">
        <div class="container">
            <ul class="flex w-full">
                <li class="px-3"><a href="#" @click="goTo('/', $event)">Home</a></li>
                <li class="px-3"><a href="#" @click="goTo('/clans', $event)">Clans</a></li>
            </ul>
        </div>
    </nav>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    name: 'Header',

    computed: {
        ...mapGetters([
            'getPage'
        ])
    },

    methods: {
        ...mapActions([
            'setPage'
        ]),
        goTo(href, e) {
            e.preventDefault()
            history.pushState('', '', href)
            this.setPage(href)
        }
    }
}

</script>