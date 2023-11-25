var http = require('http');
var fs = require('fs');

// create a http server
http.createServer(function (req, res) {    
        // redirect to your main domain with 301 (Moved Permanently) HTTP code in the response
        res.writeHead(301, { "Location":  process.env.APP_URL });
        return res.end();
}).listen(8085);