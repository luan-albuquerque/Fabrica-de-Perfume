
    $(window).load(function() {
        var perfume,tipo;

        $('button[name=preparar]').click(function() {
            perfume = document.getElementById("perfume").value;
            parcela1 = perfume / 2;
            parcela2 = parcela1 / 2;
            tipo = document.getElementById("tipo_v").value;

if(tipo=='1'){
    document.getElementById("frag").value = (parcela2 * 1000);
    document.getElementById("agua").value = (parcela1 * 1000);
    document.getElementById("alcool").value = (parcela2 * 1000);
    
} else{
    document.getElementById("frag").value = parcela2;
    document.getElementById("agua").value = parcela1;
    document.getElementById("alcool").value = parcela2;

}

        });

    });


function req_p(){
   var perfume,frag,agua,alcool;

     perfume = document.getElementById("perfume").value;
     frag = document.getElementById("frag").value;
     agua = document.getElementById("agua").value;
     alcool = document.getElementById("alcool").value;
    
    addEventListener('submit', function (e) {
       
        if((agua+frag+alcool)!='1000'){
        alert("Valores acima do esperado.");
        e.preventDefault();
    
    }else{

        alert("Funcionou!!!");
    }

    });
};
