<template>
    <form class="mt-6" @submit.prevent="addReply">
        <div class="flex flex-wrap mb-4">
            <label class="block font-bold mb-2 text text-grey-darker tracking-wide uppercase">
                {{ __('Reply') }}
            </label>
            <textarea
                    class="appearance-none block border border-60 leading-tight px-4 py-4 rounded w-full"
                    v-model="reply"
                    cols="30"
                    rows="10"
                    placeholder="Type to reply..."
                    :class="{ 'border-danger': errors.body }"
            ></textarea>
            <div class="help-text error-text mt-2 text-danger" v-if="errors.body">
                {{ errors.body[0] }}
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-default btn-primary" type="submit">
                {{ __('Submit') }}
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        data: () => ({
            reply: null,
            errors: []
        }),
        methods: {
            async addReply() {
                try {
                    const response = await await Nova.request().post(
                        `/nova-vendor/nova-inbox-tool/message-threads/${this.$route.params.id}/messages`,
                        { body: this.reply }
                    )

                    this.$toasted.show(
                        this.__('The reply was sent!'),
                        { type: 'success' }
                    )

                    this.$emit('messageCreated', response.data)

                    this.errors = []

                    this.reply = null

                } catch (error) {
                    if (error && error.response.status == 422) {
                        this.errors = error.response.data.errors
                    }
                }
            }
        }
    }
</script>
