<template>
        <div>
            <app-dropdown v-if="! retweeted">
                <template v-slot:trigger>
                    <app-tweet-retweet-action-button :tweet="tweet" />
                </template>
                <app-dropdown-item @click.prevent="retweetOrUnretweet">Retweet</app-dropdown-item>
                <app-dropdown-item>Retweet with comment</app-dropdown-item>
            </app-dropdown>

            <app-tweet-retweet-action-button
                v-else
                :tweet="tweet"
                @click.prevent="retweetOrUnretweet"
            />
        </div>
</template>

<script>
import {useTimelineStore} from "@/store/timeline.js";

export default {
    props: {
        tweet: {
            required: true,
            type: Object
        }
    },
    setup() {
      const timeline = useTimelineStore()
      return {timeline}
    },
    computed: {
        retweeted() {
            return this.timeline.retweets.includes(this.tweet.id)
        }
    },
    methods: {
        retweetOrUnretweet() {
            if (this.retweeted) {
                this.timeline.unretweetTweet(this.tweet)
                return
            }
            this.timeline.retweetTweet(this.tweet)
        }
    }
}
</script>
