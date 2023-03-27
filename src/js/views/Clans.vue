<template>
    <div class="container">
        <div class="">
            <h2>Clans</h2>
        </div>
        <div class="">
            <table>
                <thead>
                    <tr><th>123</th></tr>
                </thead>
            </table>
        </div>
    </div>
</template>

<script>
import axios from '../helpers/axios'
import appConfig from '../config'

export default {
    name: 'Clans',
    mounted() {
        this.getClans()
    },
    methods: {
        async getClans() {
            const clans = await axios.get(`http://coc.test/api.php`)
                .then( res => {
                    console.log(res)
                })
        }
    }
}
</script>