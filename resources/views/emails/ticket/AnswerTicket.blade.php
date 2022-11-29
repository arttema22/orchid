Уважаемый(ая) {{$mess->user}}.<br>
От Вас поступило сообщение <b>"{{$mess->ticket_title}}"</b><br>
<small>{{$mess->message}}</small><br>

<h3>Вот наш ответ:</h3>
{{$mess->answer}}

<br>
<a href="{{$mess->ticket_url}}">Посмотреть переписку</a>
