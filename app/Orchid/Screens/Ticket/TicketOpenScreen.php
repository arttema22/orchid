<?php

namespace App\Orchid\Screens\Ticket;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Sight;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;
use App\Orchid\Layouts\Answer\AnswerEditLayout;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\View;

class TicketOpenScreen extends Screen
{
    public $ticket;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Ticket $ticket): iterable
    {
        return [
            'ticket' => $ticket,
            'draft' => Answer::where('ticket_id', $ticket->id)->where('status', 0)->first(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->ticket->title;
    }

    /**
     * Display description name.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Создано ' . $this->ticket->created_at . ' ' . $this->ticket->status->name . ' с ' . $this->ticket->updated_at;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Взять в работу')
                ->icon('check')
                ->class('btn btn-success')
                ->method('toWork')
                ->canSee($this->ticket->status_id == 1),

            Link::make('Закрыть')
                ->route('ticket.list')
                ->icon('close'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::columns([
                Layout::legend('ticket', [
                    Sight::make('fullName', 'ФИО'),
                    Sight::make('organisation', 'Организация'),
                ]),
                Layout::legend('ticket', [
                    Sight::make('ls', 'Л/С'),
                    Sight::make('address', 'Адрес'),
                ]),
                Layout::legend('ticket', [
                    Sight::make('phone', 'Телефон'),
                    Sight::make('email', 'Почта'),
                ]),
            ]),

            Layout::view('ticket.partials.message'),

            Layout::view('ticket.partials.setanswer')->canSee($this->ticket->status_id == 2),
            Layout::tabs([
                'Дать ответ' => [
                    Layout::block(AnswerEditLayout::class)
                        ->title('Ответ на обращение')
                        ->description('Сохранить - только сохраняет ответ как черновик. Отправить - Сохраняет и отправляет ответ.')
                        ->commands(
                            Button::make('Сохранить')
                                ->method('save')
                                ->class('btn btn-success')
                                ->icon('check')
                        ),
                ],
            ])->canSee($this->ticket->status_id == 2),
        ];
    }

    public function toWork(Ticket $ticket)
    {
        $ticket->status_id = 2;
        $ticket->save();
        Toast::info('Обращение взято в работу');
    }

    public function save(AnswerRequest $request, Ticket $ticket, $draft)
    {
        dd($draft);
        //  'draft' => Answer::where('ticket_id', $ticket->id)->where('status', 0)->get(),
        $draftId = $request->input('draft.id');
        Answer::updateOrCreate(
            ['id' => $draftId],
            array_merge(
                $request->validated()['draft'],
                [
                    'user_id' => Auth::user()->id,
                    'ticket_id' => $ticket->id,
                ]
            )
        );
        Toast::info('Ответ сохранен');
    }
}
