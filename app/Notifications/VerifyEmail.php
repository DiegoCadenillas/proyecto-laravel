<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    //    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage())
            ->greeting(Lang::get('Hola!'))
            ->subject(Lang::get('Verifique su correo electrónico'))
            ->line(Lang::get('Por favor de click al botón de abajo para verificar su correo electrónico.'))
            ->action(
                Lang::get('Verificar Correo Electrónico'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('Si no ha creado una cuenta en nuestro sitio web, puede ignorar este mensaje.'))
            ->salutation(Lang::get('Gracias por elegirnos!'));
    }
}
