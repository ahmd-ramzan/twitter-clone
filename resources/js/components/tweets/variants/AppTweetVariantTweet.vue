<template>
    <div class="flex w-full">
        <div class="mr-3">
            <img :src="tweet.user.avatar" class="w-12 rounded-full">
        </div>
        <div class="text-gray-300 whitespace-pre-wrap">
            <app-tweet-username
                :user="tweet.user"
            />
            <p>{{ tweet.body }}</p>

            <app-tweet-action-group
                :tweet="tweet"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        tweet: {
            required: true,
            type: Object
        }
    }
}
</script>
