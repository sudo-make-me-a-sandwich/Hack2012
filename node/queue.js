
/**
 * Config section
 */

var config = {
    port: 8080
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
    console.log(JSON.stringify(data));
}

/**
 * Main
 */


var rabbit = amqp.createConnection({ host: 'localhost' });

http.createServer(function (req, res) {
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
        var post = qs.parse(body);
        pushData(post);
        res.end(); 
    });
}).listen(config.port);

