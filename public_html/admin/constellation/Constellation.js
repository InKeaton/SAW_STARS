class Constellation extends CRUDTable {

    constructor(consList) {
        super(consList);
    }

    init() { 
        CRUDTable.updUrl = '../../../_api/admin_api/constellation/adUpdate.php';
        CRUDTable.insUrl = '../../../_api/admin_api/constellation/adInsert.php';
        CRUDTable.delUrl = '../../../_api/admin_api/constellation/adDelete.php';
        this.h1Element = "Constellation"; 
    }

    SelectRow (id, element) {
        const startDate =   new Date(element.startDate);
        const endDate   =   new Date(element.endDate);

        return "<tr id = " +id+ "><td>" +
            "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'>" + 
            "Cons Name: <input type='text' name='consName' value = '" + element.consName + "'> " +
            "Start Date: <input type='date' name='startDate' value = '" + startDate.toISOString().substring(0, 10)+ "'> " +
            "End Date: <input type='date' name='endDate' value = '" + endDate.toISOString().substring(0, 10) +"'>" + 
            "Description: <input type='text' name='description' value = '" + element.description +"'>" +
            "<input type='hidden' value='"+element.consID+"' name='consID'> " +
            "<input type='submit' value='submit me'>"+
            "</form></td>"+ 
            "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
            "<input type='hidden' name='consID' value='"+element.consID+"'>"+  
            "<input type='submit' value='delete constellation'>" +
            "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                "Cons Name: <input type='text' name='consName' value = ''> " +
                "Start Date: <input type='date' name='startDate' value = ''> " +
                "End Date: <input type='date' name='endDate' value = ''>" + 
                "Description: <input type='text' name='description' value = ''>" +
                "<input type='submit' value='submit me'>"+
                "</form></td>"+
                "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                "<input type='hidden' name='starID' value=''>"+  
                "<input type='submit' value='delete star'>" +
                "</form></td></tr>";
    }
    
}
