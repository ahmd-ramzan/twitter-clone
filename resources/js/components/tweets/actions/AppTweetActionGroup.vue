<template>
    <ul class="flex mt-4 justify-content-around">
        <li>
            <app-tweet-reply-action
            />
        </li>
        <li>
            <app-tweet-retweet-action
                :tweet="tweet"
            />
        </li>
        <li>
            <app-tweet-like-action
                :tweet="tweet"
            />
        </li>
    </ul>
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
