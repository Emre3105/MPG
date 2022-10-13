const express = require('express');
const request = require('request');
const Basketballer = require('./player');
const Team = require('./team');

const app = express();
const port = 3000;


app.get("/players", (req, res) => {
    page = req.query.page;
    if (page === undefined) {
        page = 1;
    }
    request.get("https://www.balldontlie.io/api/v1/players?page=" + page, (error, response, body) => {
        if(error){
            console.log("Erreur : ", error);
        }else{
            let playersJson = JSON.parse(body);
            let players = [];
            for(p of playersJson.data){
                players.push(new Basketballer(p.id,p.first_name + " " + p.last_name, p.position));
            }
            res.send(players);
        }
    });
});

app.get("/teams", (req, res) => {
    page = req.query.page;
    if (page === undefined) {
        page = 1;
    }
    request.get("https://www.balldontlie.io/api/v1/teams", (error, response, body) => {
        if(error){
            console.log("Erreur : ", error);
        }else{
            let teamsJson = JSON.parse(body);
            let teams = [];
            for(t of teamsJson.data){
                teams.push(new Team(t.id, t.full_name, t.city));
            }
            res.send(teams);
        }
    });
});


app.listen(port, () => {
    console.log(`Listening at http://localhost:${port}`);
});
