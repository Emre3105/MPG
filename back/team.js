class Team {
  constructor(id, name, city) {
    this.id = id;
    this.name = name;
    this.city = city;
    this.players = [];
  }
  add(player) {
    this.players.push(player);
  }
  remove(player) {
    this.players.splice(this.players.indexOf(player), 1);
  }
}

module.exports = Team;