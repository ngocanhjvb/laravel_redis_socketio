var io = require('socket.io')(6001)
console.log('Connected to port 6001');
io.on('error', function (socket) {
    console.log('error' + socket)
});
io.on('connection', function (socket) {
    console.log('co nguoi vua ket noi' + socket.id)
});

var Redis = require('ioredis');
var redis = new Redis(6379)

redis.psubscribe('*', function (error, count) {

});
redis.on('pmessage',function (partner,channel,message) {
    console.log(channel)
    console.log(partner)
    console.log(message)

    message = JSON.parse(message)

    io.emit("demo_database_chat:" + message.event, message.data.chats);
});



