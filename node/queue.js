
/**
 * Config section
 */

var config = {
    port: 8080,
    queueName: 'messages'
};

/**
 * Required modules
 */

var http = require('http');
var qs = require('querystring');
var amqp = require('amqp');

/**
 * Functions
 */

function pushData(data)
{
    console.log('Saving: ' + JSON.stringify(data));
    rabbit.publish(config.queueName, data);
}

/**
 * Main
 */

console.log('Starting up rabbit connection');
var rabbit = amqp.createConnection({ host: 'localhost' });

rabbit.on('ready', function () {
    console.log('Started Rabbit setting up http server');
    http.createServer(function (req, res) {
        console.log('Connection Recieved');
        res.writeHead(200, {'Content-Type': 'text/plain'});
        var body = '';
        req.on('data', function (data) {
            body += data;
            if (body.length > 1e6) {
                // FLOOD ATTACK OR FAULTY CLIENT, NUKE req
                req.connection.destroy();
            }
        });
        req.on('end', function () {
            console.log('Ending connection');
            var post = qs.parse(body);
            pushData(post);
            res.end(); 
        });
    }).listen(config.port);
});

