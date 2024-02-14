class ObjFab {
    //Unico campo obbligatorio deve essere il campo tag
    static CreateElement(tag, id="", classe="") {
        var r = document.createElement(tag);
        r.id = id;
        r.classList.add(classe);
        return r;
    }

    static CreateElementImg(tag, img, id="", classe="classeNonDefinita") {
        var r = document.createElement(tag);
        r.id = id;
        r.src = img;
        r.classList.add(classe);
        return r;
    }
}
