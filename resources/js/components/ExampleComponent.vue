<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{ user }}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
