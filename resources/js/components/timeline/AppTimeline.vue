<template>
    <div>
        <app-tweet
            v-for="tweet in tweets"
            :key="tweet.id"
            :tweet="tweet"
        />
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "AppTimeline",
    data() {
        return {
            tweets: []
        }
    },
    methods: {
        async getTweets() {
            let response = await axios.get('/api/timeline')
            this.tweets = response.data.data
        }
    },
    created() {
        this.getTweets()
    }
}
</script>

<style scoped>

</style>
