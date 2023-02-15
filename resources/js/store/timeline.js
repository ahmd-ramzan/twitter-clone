import {defineStore} from "pinia";
import axios from "axios";
import {without} from "lodash";

export const useTimelineStore = defineStore('timeline', {
    state: () => {
        return {
            tweets: [],
            likes: [],
            lastPage: 1
        }
    },
    getters: {
      sortedTweets: (state) => state.tweets.sort((a, b) => b.created_at - a.created_at),
        //likes: (state) => state.likes
    },
    actions: {
        async getTweets(url) {
            let response = await axios.get(url)
            this.lastPage = response.data.meta.last_page
            this.pushLikes(response.data.meta.likes)
            response.data.data.map((tweet) => {
                this.tweets.push(tweet)
            })
        },
        pushLikes(data) {
            data.map((like) => {
                this.likes.push(like)
            })
        },
        pushLike(id) {
            this.likes.push(id)
        },
        popLike(id) {
            this.likes = without(this.likes, id)
        },
        async likeTweet(tweet) {
            await axios.post(`/api/tweets/${tweet.id}/likes`)
        },
        async unlikeTweet(tweet) {
            await axios.delete(`/api/tweets/${tweet.id}/likes`)
        },
        setLikes({id, count}) {
            this.tweets.map((tweet) => {
                if (tweet.id === id) {
                    tweet.likes_count = count
                }
                return tweet
            })
        },
        syncLike(id) {
            if (this.likes.includes(id)) {
               this.popLike(id)
                return
            }
            this.pushLike(id)
        }
    }
})
