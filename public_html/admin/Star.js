import  CRUDTable from "./CRUDTable.js"; 

export default class Star extends CRUDTable {
    constructor(list) { super(list); }

    init() { this.h1Element = "Star"; }

    genRow(id, element) {
        return "<tr><td>" +
            "<form action='javascript:Update(this)'>" + 
            "Starname: <input type='text' name='starName' value = '" + element.starName + "'> " +
            "Distance light year: <input type='numeric' name='dLY' value = '" + element.dLY + "'> " +
            "price: <input type='numeric' name='price' value = '" + element.price +"'>" + 
            "<input type='hidden' value='"+element.starID+" name='starID'>" +  
            "</form></td></tr>";
    }
}
