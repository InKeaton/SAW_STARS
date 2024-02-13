class Star extends CRUDTable {
    static consMenu = {};
    static consList;

    constructor(starList, consList) {
        Star.consList = consList;
        super(starList);
    }

    init() { 
        CRUDTable.updUrl = '../../_api/admin_api/star/adUpdate.php';
        CRUDTable.insUrl = '../../_api/admin_api/star/adInsert.php';
        CRUDTable.delUrl = '../../_api/admin_api/star/adDelete.php';
        this.GenConsMenu();
        this.h1Element = "Star"; 
    }

    GenConsMenu() {
        Star.consList.forEach(element => { 
            Star.consMenu[element.consID] = "<option value="+element.consID+" unselected>" + element.consName + "</option>";
        });
    }

    static SelectValue(val) {
        Star.consMenu[val] = Star.consMenu[val].toString().replace("unselected", "selected");
        var ret = Star.StringSelect();
        Star.consMenu[val] = Star.consMenu[val].toString().replace("selected", "unselected");
        return ret;
    }

    static StringSelect() {
        var ret;
        Object.keys(Star.consMenu).forEach(key => { ret += Star.consMenu[key].toString();});
        return ret;
    }

    SelectRow (id, element) {
        return  "<tr id = " +id+ "><td>" +
                "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'>" + 
                "<label> Nome Stella: <input type='text' name='starName' value = '" + element.starName + "'></label> " +
                "<label> Distanza anni luce: <input type='numeric' name='dLY' value = '" + element.dLY + "'></label> " +
                "<label> Prezzo: <input type='numeric' name='price' value = '" + element.price +"'></label>" + 
                "<input type='hidden' value='"+element.starID+"' name='starID'> " +
                "<label> Costellazione: <select name = 'consFK' value = "+ element.consFK +">" + Star.SelectValue(element.consFK) + "</select></label>" +  
                "<input type='submit' value='modifica'>"+
                "</form></td>"+ 
                "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
                "<input type='hidden' name='starID' value='"+element.starID+"'>"+  
                "<input type='submit' value='cancella'>" +
                "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "<label>Starname: <input type='text' name='starName' value = ''> </label>" +
                        "<label>Distance light year: <input type='numeric' name='dLY' value = ''></label> " +
                        "<label>Price: <input type='numeric' name='price' value = ''></label> " + 
                        "<label>Costellazione: <select name = 'consFK' value = ''>" + Star.StringSelect() + "</select></label> " +  
                        "<input type='submit' value='inserisci'>"+
                        "</form></td>"+
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                        "<input type='submit' value='cancella'>" +
                        "</form></td></tr>";
    }
}
