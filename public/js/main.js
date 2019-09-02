$(document).ready(function(){
    $('select').formSelect();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        firstDay: 1,
        i18n: {
            months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
            monthsShort: ["Янв", "Февр", "Март", "Апр", "Май", "Июнь", "Июль", "Авг", "Сент", "Окт", "Нояб", "Дек"],
            weekdays: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
            weekdaysShort: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
            weekdaysAbbrev: [ 'Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']
        },
        setDefaultDate: true,
        defaultDate: new Date(),
        minDate: new Date('2000, 1, 1'),
        maxDate: new Date('2099, 1, 1')
    });
});

