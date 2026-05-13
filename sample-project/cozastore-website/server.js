const http = require("http");

http.createServer((request,response) => {

    response.write("my first node server");
    response.end()
}).listen(1000);