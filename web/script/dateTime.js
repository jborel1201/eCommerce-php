

$(function () {
    var date = new Date()
    $("#datepicker").datepicker({

        dayNames: [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
        dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
        monthNamesShort: [ "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre" ],
        yearRange: `${date.getFullYear()-80}: ${date.getFullYear()}`,
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true
    });

});
