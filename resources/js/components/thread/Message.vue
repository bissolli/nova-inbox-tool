<template>
    <div class="flex items-top ml-8 py-8 border-b border-40">
        <div>
            <nit-avatar :name="item.sender.name" :model="item.sender_type" />
        </div>
        <div class="">
            <div class="t-message--body" v-html="item.body"></div>
            <p class="text-grey-dark mt-4 text-sm">
                Sent by {{ item.sender.name }} {{ item.created_at | nitFromNow }}
            </p>
        </div>
    </div>
</template>

<script>
    import NitAvatar from '../Avatar'

    export default {
        components: {
            NitAvatar
        },
        props: {
            item: {
                type: Object,
                required: true
            }
        }
    }
</script>
