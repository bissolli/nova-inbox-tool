Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-inbox-tool.inbox',
            path: '/nova-inbox-tool',
            component: require('./components/inbox/Index'),
        },
        {
            name: 'nova-inbox-tool.threads.show',
            path: '/nova-inbox-tool/threads/:id',
            component: require('./components/thread/Index'),
        }
    ])
})
