class Star extends GameElement {
    life;
    static arLeft = ['11vw', '30vw', '47vw', '65vw', '83vw'];
    static starId = 0;
    static starTimeSpaw = 1000;
    static move = 1;

    constructor() { 
        super();  
        this.life = (Math.floor(Math.random() * 5) + 1);
        this.docTag.style.filter = "brightness(" + (100/this.life) + "%)";
    }

    static GenerateStar() {new Star(); }

    static Spid() { Star.starTimeSpaw -= 10; Star.move += 0.2;}

    init() {  
        this.docTag = ObjFab.CreateElementImg("img", "./_resource/img/star.png", Star.starId + "star", "star");  
        Star.starId++;
    }
    display() {
        var id = (Math.floor(Math.random() * 5) + 1);
        document.getElementById(id).appendChild(this.docTag);
        this.docTag.style.left = Star.arLeft[id-1];
        this.docTag.style.top = '20vh';
    }
    move() {
        var pos = parseInt(this.docTag.style.top.toString().replace('vh', ''));
        if(pos > 80 && this.life > 0) {
            this.destroy();
            Player.GameOver();
        } else if(this.life <= 0) {
            this.docTag.style.top =  (pos-10) + 'vh';
        }  else if(pos < 5) { 
            this.destroy();  
        } else this.docTag.style.top =  (pos+Star.move) + 'vh';
    }

    collide() {
        Object.values(GameElement.objArray).forEach((el) => {
            if(el.docTag.id.search("bullet") != -1 && this.life > 0) {
                if( 
                    (el.docTag.style.left == this.docTag.style.left) && 
                    (el.docTag.style.top < (this.docTag.style.top+this.docTag.style.height))
                ) {
                    el.destroy();
                    this.life--;
                    if((this.life) <= 0) { 
                        this.docTag.style.opacity = "0.7";
                        Player.AddPoint();
                    }
                    else this.docTag.style.filter = "brightness(" + (100/this.life) + "%)";
                }
            }
        });
    }
    input(event) {}
}
