/**
 * Created by lloyd on 6/2/2017.
 */
var http=require('http');
http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write('Im blue da ba dee da ba die' + req.url);
    res.end();
}).listen(1337);


/**http.get( 'http://api.bls.gov/publicAPI/v2/timeseries/data/' , callback);
 console.log(http.get({ 'content-length': 'Content-Length',
    'content-type': 'Content-Type: application/json',
    'connection': 'keep-alive',
    'host': 'localhost',
    'port': '1337',
    'accept': '*/
/** *' }));*/