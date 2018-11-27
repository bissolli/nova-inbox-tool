Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-inbox-tool',
            path: '/nova-inbox-tool',
            component: require('./components/Inbox'),
        },
        // {
        //     name: 'nova-inbox-tool',
        //     path: '/nova-inbox-tool-test',
        //     component: require('./components/InboxThreads'),
        // },
    ])
})
