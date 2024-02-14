class GameElement {
    static objArray = {};
    static numObj = 0;
    idObj = 0;
    
    #docTag;
    set docTag(nDocTag) { this.#docTag = nDocTag; }
    get docTag() { return this.#docTag; }


    init()           {throw new Exception("Errore");}
    input(event)     {throw new Exception("Errore");}
    move()           {throw new Exception("Errore");}
    collide()        {throw new Exception("Errore");}
    display()        {throw new Exception("Errore");}
    constructor() {
        this.init();
        this.display();
        this.idObj = GameElement.numObj++;
        GameElement.objArray[this.idObj] = this;
    }

    destroy() {
        this.docTag.remove();
        GameElement.RemoveObj(this.idObj);
    }
 
    static RemoveObj(id) {delete GameElement.objArray[id];}
    static HandleClick(event) { Object.values(GameElement.objArray).forEach((e) => {e.input(event);}); }
    static Cicle() {Object.values(GameElement.objArray).forEach((e) => { e.move(); e.collide();}); }
}