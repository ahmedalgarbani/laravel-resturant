import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('order-placed')
    .listen('RealTimeNotificationEvent', (e) => {
        console.log(e);
    });
