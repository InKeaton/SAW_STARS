class Review extends CRUDTable {
    static userMenu = {};
    static starMenu = {};
    static userList;
    static starList;

    constructor(revList, userList, starList) {
        Review.userList = userList;
        Review.starList = starList;
        super(revList);
    }

    init() { 
        CRUDTable.updUrl = '../../../_api/admin_api/review/adUpdate.php';
        CRUDTable.insUrl = '../../../_api/admin_api/review/adInsert.php';
        CRUDTable.delUrl = '../../../_api/admin_api/review/adDelete.php';
        Review.userList.forEach(el => { Review.userMenu[el.userID] = "<option value="+el.userID+" unselected>"+el.email+"</option>";    });
        Review.starList.forEach(el => { Review.starMenu[el.starID] = "<option value="+el.starID+" unselected>"+el.starName+"</option>"; });
        this.h1Element = "Constellation"; 
    }

    static SelectValue(obj, val) {
        obj[val] = obj[val].toString().replace("unselected", "selected");
        var ret = Review.StringSelect(obj);
        return ret;
    }

    static StringSelect(obj) {
        var ret;
        Object.keys(obj).forEach(key => { ret += obj[key].toString();});
        return ret;
    }

    SelectRow (id, element) {
        const data = new Date(element.revDate);
        return  "<tr id = " +id+ "><td>" +
                "<form action='javascript:CRUDTable.Update("+id+")' id='"+"update"+id+"'>" + 
                "Star Name: <select name = 'starName' value = "+ element.starFK +">" + Review.SelectValue(Review.starMenu, element.starFK) + "</select>" +  
                "Email: <select name = 'email' value = "+ element.userFK +">" + Review.SelectValue(Review.userMenu, element.userFK) + "</select>" +  
                "Rev Date: <input type='date' name='revDate' value = "+data.toISOString().substring(0, 10)+">" + 
                "Vote: <input type='numeric' name='vote' value = '" + element.vote +"'>" + 
                "Note: <input type='text' name='note' value = '" + element.note +"'>" + 
                "<input type='hidden' value='"+element.reviewID+"' name='reviewID'> " +
                "<input type='submit' value='submit me'>"+
                "</form></td>"+ 
                "<td><form action='javascript:CRUDTable.Delete("+id+")' id='"+"delete"+id+"'>" +
                "<input type='hidden' name='reviewID' value='"+element.reviewID+"'>"+  
                "<input type='submit' value='delete review'>" +
                "</form></td></tr>";
    }

    InsertRow(id) {
        var row = document.getElementById("CRUDtable").insertRow(0);
        row.id = id;
        row.innerHTML = "<tr id="+id+"><td>" +
                        "<form action='javascript:CRUDTable.Insert("+id+")' id='"+"insert"+id+"'>" +
                        "Star Name: <select name = 'starFK'>" + Review.StringSelect(Review.starMenu) + "</select>" +  
                        "Email: <select name = 'userFK' >" + Review.StringSelect(Review.userMenu) + "</select>" +  
                        "Rev Date: <input type='date' name='revDate'>" + 
                        "Vote: <input type='numeric' name='vote'>" + 
                        "Note: <input type='text' name='note'>" + 
                        "<input type='submit' value='Insert'>"+
                        "</form></td>"+
                        "<td><form action='javascript:CRUDTable.Back("+id+")' id='"+"Back"+id+"'>" +
                        "<input type='submit' value='delete review'>" +
                        "</form></td></tr>";
    }
}
