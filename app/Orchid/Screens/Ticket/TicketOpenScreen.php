<?php

namespace App\Orchid\Screens\Ticket;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Sight;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;
use App\Orchid\Layouts\Answer\AnswerEditLayout;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Input;

class TicketOpenScreen extends Screen
{
    public $Ticket;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Ticket $Ticket): iterable
    {
        return [
            'Ticket' => $Ticket,
            'Draft' => Answer::where('ticket_id', $Ticket->id)->where('status', 0)->first(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->Ticket->title;
    }

    /**
     * Display description name.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Создано ' . $this->Ticket->created_at . ' ' . $this->Ticket->status->name . ' с ' . $this->Ticket->updated_at;
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
                ->canSee($this->Ticket->status_id == 1),

            Button::make('Закрыть обращение')
                ->icon('close')
                ->class('btn btn-warning')
                ->method('toClose')
                ->canSee($this->Ticket->status_id == 3),

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
                Layout::legend('Ticket', [
                    Sight::make('fullName', 'ФИО'),
                    Sight::make('organisation', 'Организация'),
                ]),
                Layout::legend('Ticket', [
                    Sight::make('ls', 'Л/С'),
                    Sight::make('address', 'Адрес'),
                ]),
                Layout::legend('Ticket', [
                    Sight::make('phone', 'Телефон'),
                    Sight::make('email', 'Почта'),
                ]),
            ]),

            Layout::view('ticket.partials.message'),

            Layout::rows([
                Input::make('Draft.id')->type('hidden'),
                Quill::make('Draft.message'),
                Group::make([
                    Button::make('Сохранить')
                        ->method('save')
                        ->class('btn btn-success')
                        ->icon('save-alt'),
                    Button::make('Отправить')
                        ->method('send')
                        ->class('btn btn-danger')
                        ->icon('paper-plane'),
                ]),
            ])->canSee($this->Ticket->status_id == 2),
        ];
    }

    public function toWork(Ticket $ticket)
    {
        $ticket->status_id = 2;
        $ticket->save();
        Toast::info('Обращение взято в работу');
    }

    public function toClose(Ticket $ticket)
    {
        $ticket->status_id = 4;
        $ticket->save();
        Toast::info('Обращение закрыто');
    }

    public function save(AnswerRequest $request, Ticket $ticket)
    {
        $draftId = $request->input('Draft.id');
        Answer::updateOrCreate(
            ['id' => $draftId],
            array_merge(
                $request->validated()['Draft'],
                [
                    'user_id' => Auth::user()->id,
                    'ticket_id' => $ticket->id,
                ]
            )
        );
        Toast::info('Ответ сохранен');
    }

    public function send(AnswerRequest $request, Ticket $ticket)
    {
        $this->save($request, $ticket);

        $draftId = $request->input('Draft.id');
        $answer = Answer::find($draftId);
        $answer->status = 1;
        $answer->save();

        $ticket->status_id = 3;
        $ticket->save();

        Toast::info('Ответ отправлен автору обращения');
    }
}
