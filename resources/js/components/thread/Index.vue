<template>
    <loading-view :loading="initialLoading">
        <heading class="mb-3">Thread ID: {{ $route.params.id }}</heading>
        <card class="py-3 px-6" v-if="thread">
            <div class="flex flex-col pb-4 border-b border-40">
                <div class="font-bold text-xl mb-2">{{ thread.subject }}</div>
                <div v-html="thread.body"></div>
                <div class="flex items-center mt-4">
                    <span class="bg-50 border border-70 flex font-black h-12 items-center justify-center mr-4 rounded-full text-80 w-12">
                        {{ thread.member.name | nitInitials }}
                    </span>
                    <div class="text-sm">
                        <p class="text-black leading-none">{{ thread.member.name }}</p>
                        <p class="text-grey-dark">{{ thread.created_at | nitFromNow }}</p>
                    </div>
                </div>
            </div>
            <nit-message v-for="message in messages" :key="message.id" :item="message" />
            <nit-reply @messageCreated="messageCreated" />
        </card>
    </loading-view>
</template>

<script>
    import NitMessage from './Message'
    import NitReply from './Reply'

    export default {
        components: {
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
            },
            messages() {
                let messages = _.cloneDeep(this.thread.messages)
                messages.shift()
                return messages
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
            },
            messageCreated(message) {
                this.thread.messages.push(message)
            }
        }
    }
</script>
