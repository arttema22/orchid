<?php

namespace App\Observers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNewTicket;
use App\Mail\NewTicket;

class TicketObserver
{
    /**
     * Handle the Ticket "created" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function created(Ticket $ticket)
    {
        // Send mail to admin and operator
        $toEmail = config('app.email_ticket');
        $moreUsers = config('app.email_control');
        Mail::to($toEmail)
            ->cc($moreUsers)
            ->send(new AdminNewTicket($ticket));

        // Send mail to client
        Mail::to($ticket->email)
            ->send(new NewTicket($ticket));
    }

    /**
     * Handle the Ticket "updated" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function updated(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function deleted(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "restored" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function restored(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function forceDeleted(Ticket $ticket)
    {
        //
    }
}
