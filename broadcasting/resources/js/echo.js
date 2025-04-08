import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

/* public
window.Echo.channel('chat').listen('NewMessage', (e) => {
    console.log(e.message);
    document.getElementById('messages').innerHTML += `<p>${e.message}</p>`;
});
*/

var userId = document.querySelector('meta[name="user_id"]').getAttribute('content');

// private
window.Echo.private('chat.'+userId).listen('NewMessage', (e) => { // chat.2
    console.log(e.message);
    document.getElementById('messages').innerHTML += `<p>${e.message}</p>`;
});

// presence channel
window.Echo.join('online')
        .here(users => {
            console.log(users);
        })
        .joining(user => {
            console.log('Joined ' + user);
        })
        .leaving(user => {
            console.log('Left ' + user);
        });