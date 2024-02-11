class CRUDTable {

    #h1Element = "Basic h1";    
    static insUrl = "";
    static updUrl = "";
    static delUrl = "";
    static id = 0;

    set h1Element(newH1)    { this.#h1Element = newH1; }

    constructor(list) {
        CRUDTable.id = 0;
        this.init();
        this.#buildPage(this);
        this.#populateTable(list, this);
    }

    SelectRow(id, element)  { throw new Error('The child class must have genRow method!!'); }
    InsertRow(id)           { throw new Error('The child class must have Insert Row!!');    }    
    init()                  { throw new Error('The child class must have init method!!'); }
   
    #buildPage(callClass) {
        var div = document.createElement("div");
        var link = document.createElement("link");
        var h1 = document.createElement("h1");
        var childDiv = document.createElement("div");
        var table = document.createElement("table");
        var button = document.createElement("button");
        
        div.classList.add("mainDiv");
        div.id = "CRUDdiv";
        childDiv.id = "CRUD";
        childDiv.classList.add("crud");
        table.id = "CRUDtable";
        button.innerHTML = "Inserisci un nuovo elemento";
        button.id = "insertButton";
        h1.innerHTML = this.#h1Element;
        link.href = '../CRUD.css';
        link.rel = 'stylesheet';

        button.onclick = function() { CRUDTable.ButtonInsert(callClass); };
        document.head.appendChild(link);
        document.body.appendChild(div);
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

    static ButtonInsert(obj)    {   document.getElementById("insertButton").disabled = true; obj.InsertRow(CRUDTable.id++);   }
    static Back(id)             {   document.getElementById("insertButton").disabled = false; document.getElementById(id).remove();   }

    static async Update(id) {
        const form = document.getElementById("update"+id);
        const response = await fetch(CRUDTable.updUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
    }

    static async Delete(id) {
        const form = document.getElementById("delete"+id);
        const response = await fetch(CRUDTable.delUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        if(result.status == 200) {
            document.getElementById(id).remove();
        }
    }

   static async Insert(id) {
        const form = document.getElementById("insert"+id);
        const response = await fetch(CRUDTable.insUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        if(result.status == 200) location.reload();
        
    }
}
