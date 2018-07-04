<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class RecuperarCuenta extends ResetPassword
{
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        return (new MailMessage)
            ->subject('Restablecer su cuenta')
            ->line('Recibió este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
            ->action('Restablecer la contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Si no solicitó un restablecimiento de contraseña, no se requieren más acciones.');
    }
}
