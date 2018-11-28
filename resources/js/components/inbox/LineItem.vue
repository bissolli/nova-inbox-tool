<template>
    <tr :class="{ 'thread--unread-line': unreadMessages }">
        <td class="w-16 text-center">
            {{ item.id }}
        </td>
        <td>
            <small
                v-if="unreadMessages"
                class="bg-danger font-bold px-2 mr-1 rounded-full text-white uppercase"
            >{{ unreadMessages }}</small>
            <span class="thread--member">
                {{ item.member.name }}
            </span>
        </td>
        <td>
            <span class="thread--subject">
                {{ item.subject }}
            </span>
            <small class="block font-thin-3">{{ item.created_at | nitDate('LLLL') }}</small>
        </td>
        <td class="text-center">
            <span class="thread--las-update">
                {{ item.updated_at | nitFromNow }}
            </span>
        </td>
        <td class="text-center">
            <router-link
                    class="cursor-pointer text-70 hover:text-primary mr-3"
                    :to="{
                        name: 'nova-inbox-tool.threads.show',
                        params: { id: item.id }
                    }"
                    :title="__('View')"
            >
                <icon type="view" width="22" height="18" view-box="0 0 22 16" />
            </router-link>
        </td>
    </tr>
</template>

<script>

    export default {
        props: {
            item: {
                type: Object,
                required: true
            }
        },
        computed: {
            unreadMessages() {
                let unread = 0
                this.item.messages.map((obj) => {
                    if (!obj.seen_at)
                        unread++
                })
                return unread
            },
        }
    }
</script>
