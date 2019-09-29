<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Calendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                timeZone: 'UTC',
                locale: 'ru',
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                monthNames: ['Январь','Февраль','Март','Апрель','Май','οюнь','οюль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','οюнь','οюль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
                dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
                dayNamesShort: ["ВС","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
                buttonText: {
                    today: "Сегодня",
                    month: "Месяц",
                    agendaWeek: "Неделя",
                    agendaDay: "День"
                },
                events: "<?=asset('php/load.php') ?>",
                selectable:true,
                selectHelper:true,
                select: function(start, end, allDay) {
                    var title = prompt("Название действий");
                    if(title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url:"/schedule/store",
                            type:"POST",
                            data:{
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                title:title, 
                                start:start, 
                                end:end
                            },
                            success:function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Успешно сохранен!");
                            }
                        });
                    }
                },
                editable:true,
                eventResize:function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/schedule/update",
                        type:"POST",
                        data:{
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            title:title,
                            start:start, 
                            end:end, 
                            id:id
                        },
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            alert('Event Update');
                        }
                    })
                },
                eventDrop:function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/schedule/update",
                        type:"POST",
                        data:{
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            title:title, 
                            start:start, 
                            end:end, 
                            id:id
                        },
                        success:function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    });
                },
                eventClick:function(event) {
                    if(confirm("Are you sure you want to remove it?")) {
                        var id = event.id;
                        $.ajax({
                            url:"/schedule/delete",
                            type:"POST",
                            data:{
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                id:id
                                },
                            success:function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Removed");
                            }
                        })
                    }
                },
            });
        });
    </script>
 </head>
    <body>
        <br />
        <h2 align="center">
            <a href="#">График групп</a>
        </h2>
        <br />
        <div class="container">
            <div id="calendar"></div>
        </div>
    </body>
</html>