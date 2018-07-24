require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


var socket = io.connect(location.origin + ':3000');

$('#sendmsg').click(function () {
    socket.emit('sendmsg', {
        message: $('#msg').val()
    });
});

socket.on('message', function(msg){
    $('.message-list').append('<p>' + msg + '</p>');
    console.log(msg);
});