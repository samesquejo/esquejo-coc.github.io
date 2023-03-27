import axios from 'axios'
import appConfig from '../config'

const revAxios = {}

const config = {
    headers: {
        Authorization: `Bearer ${appConfig.cocApiToken }`,
        'Access-Control-Allow-Origin': '*',
        Accept: 'application/json',
    }
}

revAxios.get = (url) => {
    return axios.get(url, config)
}

export default revAxios