
$(window).load(function () {
    var perfume, tipo;

    $('button[name=preparar]').click(function () {
        perfume = document.getElementById("perfume").value;
        parcela1 = perfume / 2;
        parcela2 = parcela1 / 2;
        tipo = document.getElementById("tipo_v").value;

        if (tipo == '1') {
            document.getElementById("frag").value = (parcela2 * 1000);
            document.getElementById("agua").value = (parcela1 * 1000);
            document.getElementById("alcool").value = (parcela2 * 1000);

        } else {
            document.getElementById("frag").value = parcela2;
            document.getElementById("agua").value = parcela1;
            document.getElementById("alcool").value = parcela2;

        }

    });

});


function req_p() {
    var perfume, frag, agua, alcool, soma, tipo;

    perfume = parseInt(document.getElementById("perfume").value);
    frag = document.getElementById("frag").value;
    agua = document.getElementById("agua").value;
    alcool = document.getElementById("alcool").value;
    soma = parseInt(frag) + parseInt(agua) + parseInt(alcool);
    tipo = document.getElementById("tipo_v").value;

    if (tipo == '1') { perfume = perfume * 1000 }

    if (parseInt(soma) != parseInt(perfume)) {
        alert("Valores Incopativeis!!!");
        addEventListener('submit', function (e) { e.preventDefault(); });
         req_p();
    } else {
        alert("Cadastrar com Sucesso.");
        addEventListener('submit', function (e) { e.initEvent(); });
    }



};
