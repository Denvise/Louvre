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
    var fullDate = new Date();
    var twoDigitMonth = ((fullDate.getMonth() + 1) < 10) ? '0' + (fullDate.getMonth() + 1) : (fullDate.getMonth() + 1);
    var currentDate = fullDate.getFullYear() + '-' + twoDigitMonth + '-' + fullDate.getDate();
    var currentTime = fullDate.getHours();

    $('#datepicker').datepicker({
        language: "fr",
        daysOfWeekDisabled: '0, 2',
        startDate: '1',
        datesDisabled: [year + '-01-01', year + '-05-01', year + '-05-08', year + '-07-14', year + '-08-15', year + '-11-01', year + '-11-11', year + '-12-25']
    });

    $('#datepicker').on('changeDate', function() {
        $('#louvre_ticketingbundle_purchase_dateVisit').val($('#datepicker').datepicker('getFormattedDate'));
        if ($('#datepicker').datepicker('getFormattedDate') == currentDate && currentTime >= 14) {
            $('#louvre_ticketingbundle_purchase_typeTicket option[value="Demi-journée"]').prop('selected', true);
            $('#louvre_ticketingbundle_purchase_typeTicket option[value="Journée"]').prop('disabled', true);
        } else {
            $('#louvre_ticketingbundle_purchase_typeTicket option[value="Demi-journée"]').prop('selected', false);
            $('#louvre_ticketingbundle_purchase_typeTicket option[value="Journée"]').prop('disabled', false).prop('selected', true);
        }
    });
});
