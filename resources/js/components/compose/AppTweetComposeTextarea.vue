<template>
    <textarea
        class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2"
        placeholder="What's happening"
        autofocus
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value); resize($event)"
    >
    </textarea>
</template>

<script>
export default {
    props: ['modelValue'],
    methods: {
        resize(e) {
            e.target.style.height = 'auto'
            e.target.style.height = `${e.target.scrollHeight}px`
        }
    }
}
</script>
