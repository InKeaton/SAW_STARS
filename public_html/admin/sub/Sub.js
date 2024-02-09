class Sub extends CRUDTable {
    static userMenu = {};
    static starMenu = {};
    static userList;
    static starList;

    constructor(revList, userList, starList) {
        Sub.userList = userList;
        Sub.starList = starList;
        super(revList);
    }

    init() { 
        CRUDTable.updUrl = '../../../api/admin_api/sub/adUpdate.php';
        CRUDTable.insUrl = '../../../api/admin_api/sub/adInsert.php';
        CRUDTable.delUrl = '../../../api/admin_api/sub/adDelete.php';
        Sub.userList.forEach(el => { Sub.userMenu[el.userID] = "<option value="+el.userID+" unselected>"+el.email+"</option>";    });
        Sub.starList.forEach(el => { Sub.starMenu[el.starID] = "<option value="+el.starID+" unselected>"+el.starName+"</option>"; });
        this.h1Element = "Sub"; 
    }

    static SelectValue(obj, val) {
        obj[val] = obj[val].toString().replace("unselected", "selected");
        var ret = Sub.StringSelect(obj);
        return ret;
    }

    static StringSelect(obj) {
        var ret;
        Object.keys(obj).forEach(key => { ret += obj[key].toString();});
        return ret;
    }

    SelectRow (id, element) {
        const data = new Date(element.startDate);
        return  "<tr id = " +id+ "><td>" +
                "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'>" + 
                "Star Name: <select name = 'starFK' value = "+ element.starFK +">" + Sub.SelectValue(Sub.starMenu, element.starFK) + "</select>" +  
                "Email: <select name = 'userFK' value = "+ element.userFK +">" + Sub.SelectValue(Sub.userMenu, element.userFK) + "</select>" +  
                "Start Date: <input type='date' name='startDate' value = "+data.toISOString().substring(0, 10)+">" + 
                "Life: <input type='numeric' name='life' value = '" + element.life +"'>" + 
                "<input type='hidden' value='"+element.subID+"' name='subID'> " +
                "<input type='submit' value='submit me'>"+
                "</form></td>"+ 
                "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
                "<input type='hidden' name='subID' value='"+element.subID+"'>"+  
                "<input type='submit' value='delete sub'>" +
                "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "Star Name: <select name = 'starFK'>" + Sub.StringSelect(Sub.starMenu) + "</select>" +  
                        "Email: <select name = 'userFK'>" + Sub.StringSelect(Sub.userMenu) + "</select>" +  
                        "Start Date: <input type='date' name='startDate'>" + 
                        "Life: <input type='numeric' name='life' >" + 
                        "<input type='submit' value='Insert'>"+
                        "</form></td>"+
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                        "<input type='submit' value='delete sub'>" +
                        "</form></td></tr>";
    }
}
