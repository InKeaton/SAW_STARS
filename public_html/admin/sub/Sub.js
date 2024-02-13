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
        CRUDTable.updUrl = '../../_api/admin_api/sub/adUpdate.php';
        CRUDTable.insUrl = '../../_api/admin_api/sub/adInsert.php';
        CRUDTable.delUrl = '../../_api/admin_api/sub/adDelete.php';
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
                "<label> Star Name: <select name = 'starFK' value = "+ element.starFK +">" + Sub.SelectValue(Sub.starMenu, element.starFK) + "</select></label>" +  
                "<label> Email: <select name = 'userFK' value = "+ element.userFK +">" + Sub.SelectValue(Sub.userMenu, element.userFK) + "</select></label>" +  
                "<label> Start Date: <input type='date' name='startDate' value = "+data.toISOString().substring(0, 10)+"></label>" + 
                "<label> Life: <input type='numeric' name='life' value = '" + element.life +"'></label>" + 
                "<input type='hidden' value='"+element.subID+"' name='subID'> " +
                "<label> <input type='submit' value='submit me'></label>"+
                "</form></td>"+ 
                "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
                "<input type='hidden' name='subID' value='"+element.subID+"'>"+  
                "<label> <input type='submit' value='delete sub'></label>" +
                "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "<label>Star Name: <select name = 'starFK'>" + Sub.StringSelect(Sub.starMenu) + "</select></label>" +  
                        "<label>Email: <select name = 'userFK'>" + Sub.StringSelect(Sub.userMenu) + "</select></label>" +  
                        "<label>Start Date: <input type='date' name='startDate'></label>" + 
                        "<label>Life: <input type='numeric' name='life' ></label>" + 
                        "<label><input type='submit' value='Insert'></label>"+
                        "</form></td>"+
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                        "<label><input type='submit' value='delete sub'></label>" +
                        "</form></td></tr>";
    }
}
