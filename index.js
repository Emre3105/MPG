
const express = require("express"); //Import express

const app = express(); //instantiate an express app
const port =5000; //save the port number where the server will be listening


//Idiomatic expression in express to route and respond to a client request
app.get('/', (req, res) => {        //get requests to the root ("/") will route here
    res.sendFile('index.html', {root: __dirname});      //server responds by sending the index.html file to the client's browser
                                                        //the .sendFile method needs the absolute path to the file, see: https://expressjs.com/en/4x/api.html#res.sendFile 
});

/*
app.get('/', function (req, res) {
    res.send('GET request to homepage')
  })
*/

app.listen(port, () => {
    console.log(`Now listening on port ${port}`);
}); 

app.use('/app', express.static(__dirname + '/ui/dist'));