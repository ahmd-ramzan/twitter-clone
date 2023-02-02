<template>
    <div>
        <app-tweet
            v-for="tweet in timeline.tweets"
            :key="tweet.id"
            :tweet="tweet"
        />
    </div>
</template>

<script>
import {useTimelineStore} from "@/store/timeline";
export default {
    name: "AppTimeline",
    setup() {
      const timeline = useTimelineStore()
        timeline.getTweets()
        return {timeline}
    },
    created() {
        //timeline.getTweets()
    }
}
</script>

<style scoped>

</style>
