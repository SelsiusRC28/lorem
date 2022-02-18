require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Vuelidate from 'vuelidate'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin, Vuelidate)
            .mixin({ methods: { route,  hasAnyPermission: function (permissions) {

                var allPermissions = this.$page.props.auth.can;
                var hasPermission = false;
                permissions.forEach(function(item){
                  if(allPermissions[item]) hasPermission = true;
                });
                return hasPermission;
              },
              hasRole(roles){
                var allRoles = this.$page.props.user.roles;
                    var hasRole = false;

                    roles.forEach(function(item){
                        if(allRoles[0]) {
                            if(allRoles[0].name == item)  hasRole = true;
                        }
                    });
                    return hasRole;


            }
            },

            })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
