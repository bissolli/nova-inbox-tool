import * as filters from './filters.js'

Nova.booting((Vue, router) => {

    Vue.filter('nitDate', filters.nitDate)
    Vue.filter('nitFromNow', filters.nitFromNow)
    Vue.filter('nitInitials', filters.nitInitials)

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
