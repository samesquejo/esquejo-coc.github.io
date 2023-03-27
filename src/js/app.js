
import { createApp } from 'vue'

// import routes from './routes'
import store from './store'

import AppVue from "./app.vue"

const app = createApp({
    components: {
        AppVue
    },
    data: () => ({
    }),
    mounted() {
        const location = window.location
        if (location.origin != 'http://coc.test') {
            location.href = "http://coc.test"
        }
    }
})

// app.use(routes)
app.use(store)

app.mount('#app')