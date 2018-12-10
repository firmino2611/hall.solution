<?php

namespace App\Listeners;

use App\Events\UsuarioLogou;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MensagemSistema;

class EnviarNotificacao
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UsuarioLogou  $event
     * @return void
     */
    public function handle(UsuarioLogou $event)
    {
        Notification::send(
            $event->usuario,
            new MensagemSistema()
        );
    }
}
