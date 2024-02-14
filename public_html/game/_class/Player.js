class Player extends GameElement {
    static Point = 0;
    canShoot = true;
    audio = new Audio('./_resource/sound/cannon.mp3');
    
    constructor() { super();  }
    init() {  this.docTag = ObjFab.CreateElementImg("img", "./_resource/img/cannon.png", "player");  }
    display() { document.getElementById('3').appendChild(this.docTag);}
    move() {}
    collide() {}
    input(event) {
        var tmp = this.docTag.parentElement.id;
        try {
            this.docTag.remove();
            document.getElementById(event.target.id).appendChild(this.docTag);
            if(this.canShoot == true) {
                this.canShoot = false;
                new Bullet();
                setInterval(()=>{this.canShoot=true;}, 100);
            }
        } catch(error) {
            document.getElementById(tmp).appendChild(this.docTag);
        }
    }

    static AddPoint() {
        Player.Point++;
        document.getElementById("POINT").innerHTML = Player.Point;
    }

    static GameOver() {
        alert(  "GAME OVER ORA TUTTA L'UMANITA' E' MORTA :(.\n" + 
                "Ma sei stato bravo lo stesso :)\n" + 
                "Hai rivitalizzato: " + Player.Point + " stelle.");
        location.reload();
    }
}
