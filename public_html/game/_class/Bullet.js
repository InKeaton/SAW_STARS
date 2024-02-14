class Bullet extends GameElement {  
    static bulletId = 0;
    arLeft = [];

    constructor() { super(); }

    init() { 
        this.arLeft = ['11vw', '30vw', '47vw', '65vw', '83vw'];
        this.docTag = ObjFab.CreateElementImg("img", "./_resource/img/bullet.png", Bullet.bulletId + "bullet", "bullet"); 
        this.docTag.style.top =  document.getElementById(document.getElementById("player").parentElement.id).style.left;
        Bullet.bulletId++;
    }

    display() {
        document.getElementById(document.getElementById("player").parentElement.id ).appendChild(this.docTag);
        this.docTag.style.left = this.arLeft[parseInt(this.docTag.parentElement.id)-1];
        this.docTag.style.top = '70vh';
    }

    move() {
        var pos = parseInt(this.docTag.style.top.toString().replace('vh', ''));
        if(pos < 5) this.destroy();
        this.docTag.style.top =  (pos-10) + 'vh';
    }

    collide() {}
    input() {}
}