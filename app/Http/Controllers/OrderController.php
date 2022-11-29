<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFERequest;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNewOrder;
use App\Mail\NewOrder;

class OrderController extends Controller
{
    /*
    * Функция показывает страницу с формой ввода запроса
    */
    public function index()
    {
        $Services = Service::all();
        return view('order.new', ['Services' => $Services]);
    }

    /*
    * Функция сохраняет запрос на услугу в базу
    * отправляет почтовые сообщения
    */
    public function send(OrderFERequest $request)
    {
        $order = Order::create(array_merge($request->validated(), [
            'status_id' => 1,
        ]));

        $toEmail = config('app.email_order');
        $moreUsers = config('app.email_control');
        Mail::to($toEmail)
            ->cc($moreUsers)
            ->send(new AdminNewOrder($order));

        //Mail::to($order->email)
        //    ->send(new NewOrder($order));

        return view('order.success');
    }
}
