<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFERequest;
use App\Http\Requests\TicketStatusFERequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /*
    * Функция показывает страницу с формой ввода обращения
    */
    public function index()
    {
        return view('ticket.new');
    }

    /*
    * Функция сохраняет обращение в базу.
    * Почтовые сообщения отправляет TicketObserver.
    */
    public function send(TicketFERequest $request)
    {
        Ticket::create(array_merge($request->validated(), [
            //'status_id' => 1,
            'code' => date('sdi-mh'), // секунды-день-минуты-месяц-час
        ]));
        return view('ticket.success');
    }

    /*
    * Функция показывает страницу с формой проверки (псевдо аутентификации) пользователя на то, что он имеет право
    * просмотреть обращение и он не робот (captcha)
    */
    public function status()
    {
        return view('ticket.status');
    }

    /*
    * Функция показывает страницу с обращением и ответом для проверенного пользователя
    */
    public function result(TicketStatusFERequest $request)
    {
        $Ticket = Ticket::where('code', $request->get('code'))->where('phone', $request->get('phone'))->first();
        return view('ticket.result', ['Ticket' => $Ticket]);
    }

    /*
    * Функция сохраняет оценку в базу.
    * Почтовые сообщения отправляет TicketObserver.
    */
    public
    function rating($id, Request $request)
    {
        $ticket = Ticket::find($id);
        $ticket->rating = $request->get('rating');
        $ticket->save();
        return view('ticket.rating');
    }
}
