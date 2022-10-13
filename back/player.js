class Player {
  constructor(id, name, position, team) {
    this.id = id;
    this.name = name;
    switch(position){
        case "C":
            this.position = "Center";
            break;
        case "F":
            this.position = "Power Forward";
            break;
        case "G":
            this.position = "Shooting Guard";
            break;
      default:
        this.position = "Undefined";
    }
    this.team = team;
    team.add(this);
  }
}

module.exports = Player;