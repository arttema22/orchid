<h2>На сайте создано новое обращение</h2>
<p><b>Автор:</b> {{$ticket->last_name}} {{$ticket->first_name}} {{$ticket->patronymic}}</p>
<p><b>Л/С:</b> {{$ticket->ls}}</p>
<p><b>Адрес:</b> {{$ticket->address}}</p>
<p><b>Номер телефона:</b> {{$ticket->phone}}</p>
<p><b>Email:</b> {{$ticket->email}}</p>
<p><b>Сообщение:</b></p>
<h4>{{$ticket->title}}</h4>
{{$ticket->message}}
