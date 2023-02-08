<template>
    <div>
        <div class="border-b-8 border-gray-800 p-4 w-full">
           <app-tweet-compose />
        </div>

        <app-tweet
            v-for="tweet in timeline.sortedTweets"
            :key="tweet.id"
            :tweet="tweet"
        />
    </div>
</template>

<script>
import {useTimelineStore} from "@/store/timeline";
import {ref} from 'vue'
export default {
    name: "AppTimeline",
    setup() {
        const timeline = useTimelineStore()
        let page = ref(1)

        function urlWithPage() {
            return `/api/timeline?page=${page.value}`;
        }

        function loadTweets() {
            timeline.getTweets(urlWithPage())
        }
        return {timeline, loadTweets, page}
    },
    methods: {
        scroll () {
            window.onscroll = () => {
                if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 1) {
                    this.handleScrolledToBottomOfTimeline()
                }
            }
        },
        handleScrolledToBottomOfTimeline() {
            if (this.page >= this.timeline.lastPage) {
                return;
            }
            this.page++
            this.loadTweets()
        }
    },
    created() {
       this.scroll()
        this.loadTweets()

        Echo.private(`timeline.${this.$user.id}`)
            .listen('.TweetWasCreated', (e) => {
               this.timeline.tweets.push(e)
            })
    }
}
</script>

<style scoped>

</style>
