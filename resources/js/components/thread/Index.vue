<template>
    <loading-view :loading="initialLoading">
        <heading class="mb-3">Thread ID: {{ $route.params.id }}</heading>

        <card class="p-4" v-if="thread">
            <div class="thread-details">
                <div class="thread-details--subject">
                    <srong>Subject</srong>: {{ thread.subject }}
                </div>
                <div class="thread-details--member">
                    Posted by <srong>{{ thread.member.name }}</srong> on <strong>{{ thread.created_at | fromNow }}</strong>
                </div>
            </div>
            <hr>
            <div class="thread-messages">
                <div class="t-message" v-for="message in thread.messages" :key="message.id">
                    <div class="t-message--sender">
                        Sent by <srong>{{ message.sender.name }}</srong> on <strong>{{ message.created_at | fromNow }}</strong>
                    </div>
                    <div class="t-message--body">
                        <div v-html="message.body"></div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="thread-reply">
                <h4>reply feature</h4>
            </div>
        </card>

    </loading-view>
</template>

<script>
    export default {
        filters: {
            fromNow (value) {
                return moment(value).fromNow()
            }
        },
        data: () => ({
            initialLoading: false,
            loading: false,
            thread: null
        }),
        computed: {
            shouldShowToolbar() {
                return true
            },
        },
        async created() {
            await this.getThread()
            this.initialLoading = false
        },
        methods: {
            async getThread() {
                let response = await Nova.request().get(`/nova-vendor/nova-inbox-tool/message-threads/${this.$route.params.id}`)
                this.thread = response.data
            }
        }
    }
</script>
