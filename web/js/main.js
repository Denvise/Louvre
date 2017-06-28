$(function() {
    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        daysMin: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Juil", "Aou", "Sep", "Oct", "Nov", "Dec"],
        format: "yyyy-mm-dd",
        weekStart: 1
    };
    $('#datepicker').datepicker({
        language: "fr",
        daysOfWeekDisabled: '0, 2',
        startDate: '1',

    });
});
