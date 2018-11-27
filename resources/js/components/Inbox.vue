<template>
    <loading-view :loading="initialLoading">
        <heading class="mb-3">Inbox</heading>

        <div class="flex justify-between">
            <div class="relative h-9 flex items-center mb-6">
                <icon type="search" class="absolute ml-3 text-70" />
                <!--v-model="search"-->
                <!--@keydown.stop="performSearch"-->
                <input
                        class="appearance-none form-control form-input w-search pl-search"
                        placeholder="Search"
                        type="search"
                >
            </div>

            <div class="flex items-center mb-6 ml-6">
                <checkbox :checked="true" />
                <label class="cursor-pointer pl-2">
                    {{ __('Show only unread threads') }}
                </label>
            </div>

            <span class="ml-auto mb-6">
                <button class="btn btn-default btn-primary">
                    {{ __('Send Message') }}
                </button>
            </span>
        </div>

        <loading-card :loading="loading" :class="{ 'overflow-hidden border border-50': !shouldShowToolbar }">
            <div v-if="!threads.length" class="flex justify-center items-center px-6 py-8">
                <div class="text-center">
                    <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="65" height="51" viewBox="0 0 65 51">
                        <g id="Page-1" fill="none" fill-rule="evenodd">
                            <g id="05-blank-state" fill="#A8B9C5" fill-rule="nonzero" transform="translate(-779 -695)">
                                <path id="Combined-Shape"
                                      d="M835 735h2c.552285 0 1 .447715 1 1s-.447715 1-1 1h-2v2c0 .552285-.447715 1-1 1s-1-.447715-1-1v-2h-2c-.552285 0-1-.447715-1-1s.447715-1 1-1h2v-2c0-.552285.447715-1 1-1s1 .447715 1 1v2zm-5.364125-8H817v8h7.049375c.350333-3.528515 2.534789-6.517471 5.5865-8zm-5.5865 10H785c-3.313708 0-6-2.686292-6-6v-30c0-3.313708 2.686292-6 6-6h44c3.313708 0 6 2.686292 6 6v25.049375c5.053323.501725 9 4.765277 9 9.950625 0 5.522847-4.477153 10-10 10-5.185348 0-9.4489-3.946677-9.950625-9zM799 725h16v-8h-16v8zm0 2v8h16v-8h-16zm34-2v-8h-16v8h16zm-52 0h16v-8h-16v8zm0 2v4c0 2.209139 1.790861 4 4 4h12v-8h-16zm18-12h16v-8h-16v8zm34 0v-8h-16v8h16zm-52 0h16v-8h-16v8zm52-10v-4c0-2.209139-1.790861-4-4-4h-44c-2.209139 0-4 1.790861-4 4v4h52zm1 39c4.418278 0 8-3.581722 8-8s-3.581722-8-8-8-8 3.581722-8 8 3.581722 8 8 8z" />
                            </g>
                        </g>
                    </svg>
                    <h3 class="text-base text-80 font-normal mb-6">
                        {{ __('No messages matched the given criteria.') }}
                    </h3>
                    <router-link
                            class="btn btn-sm btn-outline"
                            tag="button"
                            :to="'/create'"
                    >
                        {{ __('Send Message') }}
                    </router-link>
                </div>
            </div>

            <div class="overflow-hidden overflow-x-auto relative">
                <table
                        v-if="threads.length > 0"
                        class="table w-full"
                        cellpadding="0"
                        cellspacing="0"
                        data-testid="resource-table"
                >
                    <thead>
                    <tr>
                        <th class="w-16">
                            Id
                        </th>
                        <th class="text-left">
                            User
                        </th>
                        <th class="`text-left">
                            Subject
                        </th>
                        <th class="`text-left">
                            Updated at
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="thread in threads" :key="thread.id">
                        <td class="w-16 text-center">
                            {{ thread.id }}
                        </td>
                        <td>
                            <small class="bg-danger font-bold px-2 mr-1 rounded-full text-white uppercase">{{ thread.id }}</small>
                            {{ thread.member.name }}
                        </td>
                        <td>
                            {{ thread.subject }}
                            <small class="block font-thin-3">{{ thread.created_at | date('LLLL') }}</small>
                        </td>
                        <td class="text-center">
                            {{ thread.updated_at | fromNow }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </loading-card>

    </loading-view>
</template>

<script>

    export default {
        filters: {
            date (value, format) {
                return moment(value).format(format)
            },
            fromNow (value) {
                return moment(value).fromNow()
            }
        },
        data: () => ({
            initialLoading: true,
            loading: false,
            threads: [],
        }),
        computed: {
            shouldShowToolbar() {
                return true
            },
        },
        async created() {
            await this.getThreads()
            this.initialLoading = false
        },
        methods: {
            async getThreads() {
                let response = await Nova.request().get('/nova-vendor/nova-inbox-tool/inbox')
                this.threads = response.data
            }
        }
    }
</script>
