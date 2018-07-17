var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mongoose = require('mongoose');

var configDB = require('./messanger/configs/database');
mongoose.connect(configDB.url);

var Messages = require('./messanger/models/messages');

app.get('/', function(req, res){
  res.send('');
});

io.on('connection', function(socket){
    console.log('a user connected');
    Messages.find({}, function (err, msg) {
        io.emit('history', msg);
    });

    socket.on('sendmsg', function(request){
        console.log('message: ' + request.message);
        io.broadcast('message', request.message);
        
        var date = new Date();
        var currentDate = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

        var message = new Messages({
                name: request.name,
                msg: request.message,
                created_at: currentDate
        });
            
        message.save(function(err, message) {
            if (err) return console.error(err);
            console.dir(message);
        });
        
    });

    socket.on('disconnect', function(){
        console.log('user disconnected');
    });
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});