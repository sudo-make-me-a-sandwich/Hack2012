
/**
 * Config section
 */

var config = {
    queueName: 'messages'
};

/**
 * Required modules
 */

var amqp = require('amqp');

/**
 * Functions
 */

/**
 * Main
 */

console.log('Starting up rabbit connection');
var rabbit = amqp.createConnection({ host: 'localhost' });

rabbit.on('ready', function () {
    rabbit.queue(config.queueName, function(q){
        // Catch all messages
        q.bind('#');

        // Receive messages
        q.subscribe(function (message) {
        // Print messages to stdout
            console.log(message);
        });
    });
});

