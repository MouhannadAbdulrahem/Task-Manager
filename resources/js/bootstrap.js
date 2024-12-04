import axios from 'axios';
import Joi from 'joi';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Joi = Joi;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

window.Pusher = Pusher;


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "3ee59c7f2cc829b8d55c",
    cluster: "ap1",
    forceTLS: true
});
