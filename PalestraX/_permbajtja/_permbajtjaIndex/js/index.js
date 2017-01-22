$(document).ready(function(){
    $("#identifikohu").click(function(){
        $("#modalIdentifikimi").modal();
    });
});


    $(document).ready(function(){
    $("#regjistrohu").click(function(){
        $("#modalRegjistrimi").modal();
    });
});

    var autocompleteOFF = document.querySelectorAll( "input" );
    for( var i = 0; i < autocompleteOFF.length; i++ )
    {
        autocompleteOFF[ i ].autocomplete = "off";
    }