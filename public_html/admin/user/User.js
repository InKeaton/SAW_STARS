class User extends CRUDTable {

    constructor(userList) {
        super(userList);
    }

    init() { 
        CRUDTable.updUrl = '../../../api/admin_api/user/adUpdate.php';
        CRUDTable.insUrl = '../../../api/admin_api/user/adInsert.php';
        CRUDTable.delUrl = '../../../api/admin_api/user/adDelete.php';
        this.h1Element = "User"; 
    }


    SelectRow (id, element) {
        const data = new Date(element.createDate);
        console.log("Valore di role: " + element.role);
        const role = (element.role == 1)? "checked" : "unchecked"; 
        return "<tr id = " +id+ "><td>"+
               "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'>" +
               "Email: <input type='email' name='email' value = '" + element.email +"'>"+
               "Pwd: <input type='password' name='pass' value= '" + element.pwd + "'>" +
               "Firstname: <input type='text' name='firstname' value = '"+element.firstName+"'>"+
               "Lastname: <input type='text' name='lastname' value = '"+element.lastName+"'>"+
               "Role: <input type='checkbox' name='role' value = '1' "+  role + ">"+
               "Create Date: <input type='date' name='createDate' value = '"+ data.toISOString().substring(0, 10) + "'>"+
               "<input type='hidden' name='userID' value='"+element.userID+"'>"+
               "<input type='submit' value='update'>" +
               "</form></td>" +
               "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>"+
               "<input type='hidden' name='userID' value='"+element.userID+"'>"+
               "<input type='submit' value='delete'>" +
               "</form></td></tr>";
    }

    InsertRow(id) {
        var row =  document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id = " +id+ "><td>"+
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "Email: <input type='email' name='email' value = ''>"+
                        "Pwd: <input type='password' name='pass' value= ''>" +
                        "Firstname: <input type='text' name='firstname' value = ''>"+
                        "Lastname: <input type='text' name='lastname' value = ''>"+
                        "Role: <input type='checkbox' name='role' value = '1' >"+
                        "<input type='submit' value='update'>" +
                        "</form></td>" +
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"back"+id+"'>"+
                        "<input type='hidden' name='userID' value=''>"+
                        "<input type='submit' value='delete'>" +
                        "</form></td></tr>";
    }
    
}
