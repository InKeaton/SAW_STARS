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
        var mainDiv = document.createElement("div");
        mainDiv.innerHTML = "<div id='CRUDdiv' class='mainDiv'>" +
                                        "<h1>" + this.#h1Element + "</h1>" +
                                        "<div id='CRUD' class='crud'>"     +
                                            "<button id='insertButton'>Inserisci</button>"+
                                            "<table id='CRUDtable'> " +
                                            "</table>" +
                                        "</div>" +
                                    "</div>" + 
                                    "<div id='modal' class='modal-base'>" + 
                                        "<div class='modal-content'> " + 
                                            "<span id='modButton' class='close-button'>X</span>"+
                                            "<h1 id='msg'></h1>"+
                                        "</div>"+
                                    "</div>";

        document.head.innerHTML = "<link href= '../../_resources/style/CRUD.css' rel = 'stylesheet'>";
        document.body.appendChild(mainDiv);
        document.getElementById("modButton").addEventListener("click", CRUDTable.ModButton);    
        document.getElementById("insertButton").onclick = function() { CRUDTable.ButtonInsert(callClass); };
    }
    
    #populateTable(objList, callClass) {
        var outString = "";
        objList.forEach((element) => { outString += callClass.SelectRow(CRUDTable.id++, element); }); 
        document.getElementById("CRUDtable").innerHTML = outString;
    }

    static ButtonInsert(obj)    {   document.getElementById("insertButton").disabled = true; obj.InsertRow(CRUDTable.id++);   }
    static Back(id)             {   document.getElementById("insertButton").disabled = false; document.getElementById(id).remove();   }
    static ModButton() {
        document.getElementById("modal").classList.remove("modal-right");
        document.getElementById("modal").classList.remove("modal-wrong");
        document.getElementById("modal").classList.toggle("show-modal");
    }
    static async Update(id) { 
        const form = document.getElementById("update"+id);
        const response = await fetch(CRUDTable.updUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        document.getElementById("msg").innerHTML = result.message;
        if(result.status == 200) document.getElementById("modal").classList.add("modal-right");
        else  document.getElementById("modal").classList.add("modal-wrong");
        document.getElementById("modal").classList.toggle("show-modal");
    }

    static async Delete(id) {
        const form = document.getElementById("delete"+id);
        const response = await fetch(CRUDTable.delUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        document.getElementById("msg").innerHTML = result.message;
       if(result.status == 200) {
            document.getElementById(id).remove();
            document.getElementById("modal").classList.add("modal-right");
        } 
        else  document.getElementById("modal").classList.add("modal-wrong");
        document.getElementById("modal").classList.toggle("show-modal");
    }

   static async Insert(id) {
        const form = document.getElementById("insert"+id);
        const response = await fetch(CRUDTable.insUrl, { method: 'POST', body : new FormData(form) });
        const result = await response.json();
        document.getElementById("msg").innerHTML = result.message;
        if(result.status == 200) location.reload();
        else  { 
            document.getElementById("modal").classList.add("modal-wrong");
        }
        document.getElementById("modal").classList.toggle("show-modal");
    }
}
