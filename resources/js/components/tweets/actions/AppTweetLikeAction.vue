<template>
    <a href="#" @click.prevent="likeOrUnlike" class="flex items-center text-base">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="fill-current text-gray-600 w-5 mr-2"
            :class="{'text-red-600': liked}"
        >
            <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"/>
        </svg>
        <span
            class="text-gray-600"
            :class="{'text-red-600': liked}"
        >
            {{ tweet.likes_count }}
        </span>
    </a>
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
    computed: {
      liked() {
          return this.timeline.likes.includes(this.tweet.id)
      }
    },
    setup() {
        const timeline = useTimelineStore();
        return {timeline}
    },
    methods: {
        likeOrUnlike() {
            if (this.liked) {
                this.timeline.unlikeTweet(this.tweet)
                return
            }
            this.timeline.likeTweet(this.tweet)
        }
    }
}
</script>
