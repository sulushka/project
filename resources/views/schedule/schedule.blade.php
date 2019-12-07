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
                    right:'month'
                },
                monthNames: ['Январь','Февраль','Март','Апрель','Май','οюнь','οюль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','οюнь','οюль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
                buttonText: {
                    today: "Сегодня",
                    month: "Месяц",
                },
                events: "<?=asset('php/load.php') ?>",
                selectable:true,
                selectHelper:true,
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
            <a href="{{route('home')}}"><button class="btn btn-success mb-3">Назад</button></a>
            <div id="calendar"></div>
        </div>
    </body>
</html>