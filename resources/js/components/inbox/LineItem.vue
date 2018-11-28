<template>
    <tr>
        <td class="w-16 text-center">
            {{ item.id }}
        </td>
        <td>
            {{ item.member.name }}
        </td>
        <td>
            {{ item.subject }}
            <small class="block font-thin-3">{{ item.created_at | nitDate('LLLL') }}</small>
        </td>
        <td class="text-center">
            <small class="font-thin-3">{{ item.updated_at | nitFromNow }}</small>
        </td>
        <td class="text-center">
            <span v-if="!item.closed_at"> Open </span>
            <span v-else class="text-success"> Solved </span>
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
        }
    }
</script>
