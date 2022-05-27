const meiaEntrada = () => {
    var meia = document.getElementById('meia');
    if(meia.value > 0) {
        document.getElementById("meiaEntradaCuidado").style.display = "block";
    }
    else{
        document.getElementById("meiaEntradaCuidado").style.display = "none";
    }
    
}
