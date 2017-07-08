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

    var year = new Date().getFullYear();

    $('#datepicker').datepicker({
        language: "fr",
        daysOfWeekDisabled: '0, 2',
        startDate: '1',
        datesDisabled: [year + '-01-10', year + '-05-01', year + '-05-08', year + '-07-14', year + '-08-15', year + '-11-01', year + '-11-11', year + '-12-25']
    });

    $('#datepicker').on('changeDate', function() {
        $('#louvre_ticketingbundle_purchase_dateVisit').val($('#datepicker').datepicker('getFormattedDate'));
    });
});
