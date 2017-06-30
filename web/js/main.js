$(function() {
    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        daysMin: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Juil", "Aou", "Sep", "Oct", "Nov", "Dec"],
        weekStart: 1,
        format: "yyyy-mm-dd",
    };
    $('#datepicker').datepicker({
        language: "fr",
        daysOfWeekDisabled: '0, 2',
        startDate: '1',
    });

    $('#datepicker').on('changeDate', function() {
        $('#louvre_ticketingbundle_purchase_dateVisit').val($('#datepicker').datepicker('getFormattedDate'));
    });
});
