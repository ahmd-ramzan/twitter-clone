<template>

</template>

<script>
import axios from "axios";

export default {
        data() {
            return {
                user: null
            }
        },
        methods: {
            async getUser() {
                this.user = await axios.get('/api/user')
            }
        },
        mounted() {
            this.getUser()
        }
    }
</script>
