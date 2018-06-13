function ValidarNumero(numeros) {
    var maintainplus = '';
    var numval = numeros.value
    if (numval.charAt(0) == '+') {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-zñÑ!"£$%^&\*+_={};:'@#~Š\/<>?|`¬\]\[]/g, '');
    numeros.value = maintainplus + curphonevar;
    var maintainplus = '';
    numeros.focus;
}

function ValidarTexto(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z ñ \r]+/g, '');
}