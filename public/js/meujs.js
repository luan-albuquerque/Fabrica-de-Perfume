
    $(window).load(function() {
        var perfume,tipo;

        $('button[name=preparar]').click(function() {
            perfume = document.getElementById("perfume").value;
            parcela1 = perfume / 2;
            parcela2 = parcela1 / 2;
            tipo = document.getElementById("tipo_v").value;

if(tipo=='1'){
    document.getElementById("frag").placeholder = (parcela2 * 1000);
    document.getElementById("agua").placeholder = (parcela1 * 1000);
    document.getElementById("alcool").placeholder = (parcela2 * 1000);
    
} else{
    document.getElementById("frag").placeholder = parcela2;
    document.getElementById("agua").placeholder = parcela1;
    document.getElementById("alcool").placeholder = parcela2;

}

        });

    });


   


var frag = document.getElementById("frag").value;
var agua = document.getElementById("agua").value;
var alcool = document.getElementById("alcool").value;




function req_p(){

    addEventListener('submit', function (e) {
    
        alert('teste');
        e.preventDefault();
    });
}
