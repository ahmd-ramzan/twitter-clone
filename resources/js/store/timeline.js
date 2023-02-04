import {defineStore} from "pinia";
import axios from "axios";

export const useTimelineStore = defineStore('timeline', {
    state: () => {
        return {
            tweets: [],
            lastPage: 1
        }
    },
    actions: {
        async getTweets(url) {
            let response = await axios.get(url)
            this.lastPage = response.data.meta.last_page
            response.data.data.map((tweet) => {
                this.tweets.push(tweet)
            })
        }
    }
})
