<template>
    <span :class="color"
          class="flex h-12 items-center border justify-center mr-4 rounded-full w-12 font-black">
        {{ name | nitInitials }}
    </span>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true
            },
            model: {
                type: String,
                required: true
            }
        },
        computed: {
            color() {
                return this.model === Nova.config.models['admin']
                    ? 'bg-50 border-70 text-80'
                    : 'bg-primary-50% border-primary-dark text-primary-dark'
            }
        }
    }
</script>
