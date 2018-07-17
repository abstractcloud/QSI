require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

function personMsg (person, e) {
    $(person).append('<div class="avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name"><div class="status"></div></div>');
    $(person).append('<div class="name">' + e.name + '</div>');
    $(person).append('<div class="text">' + e.msg + '</div>');
    $(person).append('<div class="time">'+ e.created_at +'</div>');
}

var socket = io.connect(location.origin + ':3000');
var user = $('#msg').data('user');
var date = new Date();
var currentDate = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

$('#sendmsg').click(function () {
    socket.emit('sendmsg', {
        message: $('#msg').val(),
        name: $('#msg').data('user')
    });

    personMsg('.self', {
        name: user,
        msg: $('#msg').val(),
        created_at: currentDate
    });

});

socket.on('history', function (hist) {
    var person = '.friend';

    hist.forEach(function (e, i) {
        
        if(e.name === user) {
            person = '.self';
        }

        personMsg(person, e);
    });
    
});

socket.on('message', function(msg){
    personMsg('.friend', {
        name: msg.name,
        msg: msg.message,
        created_at: currentDate
    });
});