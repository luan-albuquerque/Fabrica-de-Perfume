
    $(window).load(function() {
        var perfume;

        $('button[name=preparar]').click(function() {
            perfume = document.getElementById("perfume").value;
            parcela1 = perfume / 2;
            parcela2 = parcela1 / 2;
            document.getElementById("frag").placeholder = parcela2;
            document.getElementById("agua").placeholder = parcela1;
            document.getElementById("alcool").placeholder = parcela2;


        });

    });
