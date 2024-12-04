import './bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';


window.Pusher = Pusher;


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "3ee59c7f2cc829b8d55c",
    cluster: "ap1",
    forceTLS: true
});
