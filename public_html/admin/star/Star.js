class Star extends CRUDTable {
    static consMenu = {};
    static consList;

    constructor(starList, consList) {
        Star.consList = consList;
        super(starList);
    }

    init() { 
        CRUDTable.updUrl = '../../../api/admin_api/star/adUpdate.php';
        CRUDTable.insUrl = '../../../api/admin_api/star/adInsert.php';
        CRUDTable.delUrl = '../../../api/admin_api/star/adDelete.php';
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
                "Starname: <input type='text' name='starName' value = '" + element.starName + "'> " +
                "Distance light year: <input type='numeric' name='dLY' value = '" + element.dLY + "'> " +
                "price: <input type='numeric' name='price' value = '" + element.price +"'>" + 
                "<input type='hidden' value='"+element.starID+"' name='starID'> " +
                "Costellazione: <select name = 'consFK' value = "+ element.consFK +">" + Star.SelectValue(element.consFK) + "</select>" +  
                "<input type='submit' value='submit me'>"+
                "</form></td>"+ 
                "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
                "<input type='hidden' name='starID' value='"+element.starID+"'>"+  
                "<input type='submit' value='delete star'>" +
                "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "Starname: <input type='text' name='starName' value = ''> " +
                        "Distance light year: <input type='numeric' name='dLY' value = ''> " +
                        "price: <input type='numeric' name='price' value = ''>" + 
                        "Costellazione: <select name = 'consFK' value = ''>" + Star.StringSelect() + "</select>" +  
                        "<input type='submit' value='Insert'>"+
                        "</form></td>"+
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                        "<input type='hidden' name='starID' value=''>"+  
                        "<input type='submit' value='delete star'>" +
                        "</form></td></tr>";
    }
}
