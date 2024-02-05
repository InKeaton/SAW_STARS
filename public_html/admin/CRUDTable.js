export default class CRUDTable {
    #pageStyle = "#CRUDdiv { position: absolute; left: 0%; width: 100%; height: 90%; top: 10%; }" + 
                 "#CRUDdiv > #CRUD {position: inherit; left: 1%; overflow: scroll; width: 98%; height: 90%; border: 1px; border-color: black; border-style: solid;}" +
                 "#CRUD > table {  width: 100%;}" +
                 "td { border: 2px; height: 10%; border-color: black; border-style: solid;}";   
    
    #h1Element = "Basic h1";

    constructor(list) {
        console.log("arrr");
        this.init();
        this.#buildPage();
        this.#populateTable(list);
    }
    
    set h1Element(newH1) { this.#h1Element = newH1; }
    set pageStyle(newStyle) { this.#pageStyle = newStyle; }

    init() { throw new Error('The child class must have init method!!'); }
    genRow(id, element) { throw new Error('The child class must have genRow method!!'); }

    #buildPage() {
        var div = document.createElement("div");
        var style = document.createElement("style");
        var h1 = document.createElement("h1");
        var childDiv = document.createElement("div");
        var table = document.createElement("table");
        div.id = "CRUDdiv";
        childDiv.id = "CRUD";
        table.id = "CRUDtable";
        h1.innerHTML = this.#h1Element;
        style.innerText = this.#pageStyle;
        document.head.appendChild(style);
        document.body.appendChild(div);
        document.head.style = this.#pageStyle;
        div.appendChild(h1);
        div.appendChild(childDiv);
        childDiv.appendChild(table);
    }
    
    #populateTable(objList) {
        var outString = ""; var id = 0;
        objList.forEach((element) => { outString += this.genRow(id, element); id++; }); 
        document.getElementById("CRUDtable").innerHTML = outString;
    }
}
