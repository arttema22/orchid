Внимание! Это письмо будет приходить автору обращения. Прощу проверить текст и работу ссылок.
<hr>
Здравствуйте, {{$ticket->last_name}} {{$ticket->first_name}} {{$ticket->patronymic}}.<br>
В Вашем обращении произошли изменения.
<br>
<br>
Персональный код доступа к Вашему обращению:
<h3>{{$ticket->code}}</h3>
<br>
<a href="{{route('reception.status')}}" target="_blank">Посмотреть обращение</a>
<br>
<br>
В ближайшее время мы дадим ответ или свяжемся с Вами.<br>
С уважением, команда РКС.
