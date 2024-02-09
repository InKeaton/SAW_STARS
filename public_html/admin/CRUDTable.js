class CRUDTable {
    #pageStyle= "#CRUDdiv { position: absolute; left: 0%; width: 100%; height: 90%; top: 10%; }" + 
                "#CRUDdiv > #CRUD {position: inherit; left: 1%; overflow: scroll; width: 98%; height: 90%; border: 1px; border-color: black; border-style: solid;}" +
                "#CRUD > table {  width: 100%;}" +
                "#CRUD > button { position:relative; width: 80%; left : 10%; background-color: #0096FF; border: solid; border-color: black;}" +
                "#CRUD > button:hover {  background-color: #00FFFF; }" +
                "td { border: 2px; height: 10%; border-color: black; border-style: solid;}";   
    
    #h1Element = "Basic h1";    
    static insUrl = "";
    static updUrl = "";
    static delUrl = "";
    static id = 0;

    set h1Element(newH1)    { this.#h1Element = newH1; }
    set pageStyle(newStyle) { this.#pageStyle = newStyle; }

    constructor(list) {
        CRUDTable.id = 0;
        this.init();
        this.#buildPage(this);
        this.#populateTable(list, this);
    }

    SelectRow(id, element)  { throw new Error('The child class must have genRow method!!'); }
    InsertRow(id)           { throw new Error('The child class must have Insert Row!!');}    
    init()                  { throw new Error('The child class must have init method!!'); }
   
    #buildPage(callClass) {
        var div = document.createElement("div");
        var style = document.createElement("style");
        var h1 = document.createElement("h1");
        var childDiv = document.createElement("div");
        var table = document.createElement("table");
        var button = document.createElement("button");
        div.id = "CRUDdiv";
        childDiv.id = "CRUD";
        table.id = "CRUDtable";
        button.innerHTML = "INSERT NEW ROW";
        h1.innerHTML = this.#h1Element;
        style.innerText = this.#pageStyle;
        button.onclick = function() { CRUDTable.ButtonInsert(callClass); };
        document.head.appendChild(style);
        document.body.appendChild(div);
        document.head.style = this.#pageStyle;
        div.appendChild(h1);
        div.appendChild(childDiv);
        childDiv.appendChild(button);
        childDiv.appendChild(table);
    }
    
    #populateTable(objList, callClass) {
        var outString = "";
        objList.forEach((element) => { outString += callClass.SelectRow(CRUDTable.id++, element); }); 
        document.getElementById("CRUDtable").innerHTML = outString;
    }

    static ButtonInsert(obj)    {  obj.InsertRow(CRUDTable.id++);   }
    static Back(id)             {   document.getElementById(id).remove();   }

    static async Update(id) {
        const form = document.getElementById("update"+id);
        const response = await fetch(CRUDTable.updUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        if(result.status == 200) alert("Update avvenuto con successo");
    }

    static async Delete(id) {
        const form = document.getElementById("delete"+id);
        const response = await fetch(CRUDTable.delUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        if(result.status == 200) {
            alert("Update avvenuto con successo");
            document.getElementById(id).remove();
        }
    }

   static async Insert(id) {
        const form = document.getElementById("insert"+id);
        const response = await fetch(CRUDTable.insUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        if(result.status == 200) {
            alert("Insert avvenuto con successo");
            location.reload();
        }
    }
}