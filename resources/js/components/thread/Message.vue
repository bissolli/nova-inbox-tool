<template>
    <div class="flex items-top ml-8 py-8 border-b border-40">
        <div>
            <span class="bg-50 border border-70 flex font-black h-12 items-center justify-center mr-4 rounded-full text-80 w-12">
                {{ item.sender.name | nitInitials }}
            </span>
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
    export default {
        props: {
            item: {
                type: Object,
                required: true
            }
        }
    }
</script>
