class User extends CRUDTable {

    constructor(userList) {
        super(userList);
    }

    init() { 
        CRUDTable.updUrl = '../../_api/admin_api/user/adUpdate.php';
        CRUDTable.insUrl = '../../_api/admin_api/user/adInsert.php';
        CRUDTable.delUrl = '../../_api/admin_api/user/adDelete.php';
        this.h1Element = "User"; 
    }


    SelectRow (id, element) {
        const data = new Date(element.createDate);
        console.log("Valore di role: " + element.role);
        const role = (element.role == 1)? "checked" : "unchecked"; 
        return "<tr id = " +id+ "><td>"+
               "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'></label>" +
               "<label> Email: <input type='email' name='email' value = '" + element.email +"'></label>"+
               "<label> Pwd: <input type='password' name='pass' value= '" + element.pwd + "'></label>" +
               "<label> Firstname: <input type='text' name='firstname' value = '"+element.firstName+"'></label>"+
               "<label> Lastname: <input type='text' name='lastname' value = '"+element.lastName+"'></label>"+
               "<label> Role: <input type='checkbox' name='role' value = '1' "+  role + "></label>"+
               "<label> Create Date: <input type='date' name='createDate' value = '"+ data.toISOString().substring(0, 10) + "'></label>"+
               "<input type='hidden' name='userID' value='"+element.userID+"'>"+
               "<label> <input type='submit' value='update'></label>" +
               "</form></td>" +
               "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>"+
               "<input type='hidden' name='userID' value='"+element.userID+"'>"+
               "<label> <input type='submit' value='delete'> </label>" +
               "</form></td></tr>";
    }

    InsertRow(id) {
        var row =  document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id = " +id+ "><td>"+
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "<label> Email: <input type='email' name='email' value = ''></label>"+
                        "<label> Pwd: <input type='password' name='pass' value= ''></label>" +
                        "<label> Firstname: <input type='text' name='firstname' value = ''></label>"+
                        "<label> Lastname: <input type='text' name='lastname' value = ''></label>"+
                        "<label> Role: <input type='checkbox' name='role' value = '1' ></label>"+
                        "<label> <input type='submit' value='update'></label>" +
                        "</form></td>" +
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"back"+id+"'>"+
                        "<label> <input type='submit' value='delete'></label>" +
                        "</form></td></tr>";
    }
    
}
