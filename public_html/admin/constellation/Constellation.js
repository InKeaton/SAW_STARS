class Constellation extends CRUDTable {

    constructor(consList) {
        super(consList);
    }

    init() { 
        CRUDTable.updUrl = '../../_api/admin_api/constellation/adUpdate.php';
        CRUDTable.insUrl = '../../_api/admin_api/constellation/adInsert.php';
        CRUDTable.delUrl = '../../_api/admin_api/constellation/adDelete.php';
        this.h1Element = "Costellazioni"; 
    }

    SelectRow (id, element) {
        const startDate =   new Date(element.startDate);
        const endDate   =   new Date(element.endDate);

        return "<tr id = " +id+ "><td>" +
            "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'>" + 
            "<label> Nome Costellazione: <input type='text' name='consName' value = '" + element.consName + "'></label> " +
            "<label> Data Inizio: <input type='date' name='startDate' value = '" + startDate.toISOString().substring(0, 10)+ "'> </label> " +
            "<label> Data Fine: <input type='date' name='endDate' value = '" + endDate.toISOString().substring(0, 10) +"'></label>" + 
            "<label> Descrizione: <input type='text' name='description' value = '" + element.description +"'></label>" +
            "<input type='hidden' value='"+element.consID+"' name='consID'>" +
            "<input type='submit' value='modfica'>"+
            "</form></td>"+ 
            "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
            "<input type='hidden' name='consID' value='"+element.consID+"'>"+  
            "<input type='submit' value='cancella'>" +
            "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                "<label> Nome Costellazione: <input type='text' name='consName' value = ''> </label> " +
                "<label> Data Inizio: <input type='date' name='startDate' value = ''> </label> " +
                "<label> Data Fine: <input type='date' name='endDate' value = ''></label> " + 
                "<label> Descrizione: <input type='text' name='description' value = ''></label> " +
                "<input type='submit' value='inserisci'>"+
                "</form></td>"+
                "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                "<input type='submit' value='cancella'>" +
                "</form></td></tr>";
    }
    
}
