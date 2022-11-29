<h2>На сайте создан новый запрос</h2>
<p><b>Услуга:</b> {{$order->service->name}}</p>
<p><b>Автор:</b> {{$order->last_name}} {{$order->first_name}} {{$order->patronymic}}</p>
<p><b>Адрес:</b> {{$order->address}}</p>
<p><b>Номер телефона:</b> {{$order->phone}}</p>
<p><b>Email:</b> {{$order->email}}</p>
<p><b>Сообщение:</b></p>
{{$order->message}}
