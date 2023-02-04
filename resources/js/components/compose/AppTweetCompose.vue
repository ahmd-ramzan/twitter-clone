<template>
    <form class="flex">
        <div class="mr-3">
            <img :src="$user.avatar" class="w-12 h-12 rounded-full mr-3">
        </div>
        <div>
            <textarea
                class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2"
                placeholder="What's happening"
                autofocus
            ></textarea>
            <div class="flex justify-between">
                <div>
                    actions
                </div>
                <div>
                    <button type="button" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none">Tweet</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "AppTweetCompose"
}
</script>

<style scoped>

</style>
