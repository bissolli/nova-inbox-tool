<template>
    <loading-view :loading="initialLoading">
        <heading class="mb-3">Thread ID: {{ $route.params.id }}</heading>
        <card class="py-3 px-6" v-if="thread">
            <div class="flex flex-col pb-4 border-b border-40">
                <div class="font-bold text-xl mb-2">{{ thread.subject }}</div>
                <div v-html="thread.body"></div>
                <div class="flex items-center mt-4">
                    <nit-avatar :name="thread.owner.name" :model="thread.owner_type" />
                    <div class="text-sm">
                        <p class="text-black leading-none">{{ thread.member.name }}</p>
                        <p class="text-grey-dark">{{ thread.created_at | nitFromNow }}</p>
                    </div>
                </div>
            </div>
            <nit-message v-for="message in thread.messages" :key="message.id" :item="message" />
            <nit-reply @messageCreated="messageCreated" />
        </card>
    </loading-view>
</template>

<script>
    import NitMessage from './Message'
    import NitReply from './Reply'
    import NitAvatar from '../Avatar'

    export default {
        components: {
            NitAvatar,
            NitMessage,
            NitReply
        },
        data: () => ({
            initialLoading: false,
            loading: false,
            thread: null,
        }),
        computed: {
            mainMessage() {
                return this.thread.messages[ 0 ] || null
            }
        },
        async created() {
            await this.getThread()
            this.initialLoading = false
        },
        methods: {
            async getThread() {
                let response = await Nova.request().get(`/nova-vendor/nova-inbox-tool/message-threads/${this.$route.params.id}`)
                this.thread = response.data
            },
            messageCreated(message) {
                this.thread.messages.push(message)
            }
        }
    }
</script>
