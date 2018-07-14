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
    $('.friend').append('<div class="avatar">' + '<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">' + '<div class="status"></div>'+ '</div>');
    $('.friend').append('<div class="name">John</div>');
    $('.friend').append('<div class="text">' + msg + '</div>');
    $('.friend').append('<div class="time">5 min ago</div>');
    console.log(msg);
});

socket.on('message', function(msg){
    $('.self').append('<div class="avatar">' + '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">' + '<div class="status"></div>'+ '</div>');
    $('.self').append('<div class="name">Vasya</div>');
    $('.self').append('<div class="text">' + msg + '</div>');
    $('.self').append('<div class="time">10 min ago</div>');
    console.log(msg);
});