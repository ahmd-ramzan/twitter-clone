import {defineStore} from "pinia";
import axios from "axios";

export const useTimelineStore = defineStore('timeline', {
    state: () => {
        return {
            tweets: []
        }
    },
   /* getters: {
        tweets(state) {
            return state.tweets
        }
    },*/
    actions: {
        async getTweets() {
            let response = await axios.get('/api/timeline')
            this.tweets = response.data.data
        }
    }
})
