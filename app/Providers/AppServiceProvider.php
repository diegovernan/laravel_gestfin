<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Override the email notification for verifying email
        // Comentar tudo para voltar para o inglês
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $mail = new MailMessage;
            $mail->subject('Confirmação de e-mail!');
            $mail->line('Por favor, clique no botão abaixo para confirmar o seu e-mail.');
            $mail->action('Confirmar e-mail', $url);
            $mail->line('Caso você não tenha feito esta solicitação, basta ignorar este e-mail.');
            return $mail;
        });

        // Override the email notification for verifying email
        // Comentar tudo para voltar para o inglês
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $mail = new MailMessage;
            $mail->subject('Redefinição de senha!');
            $mail->line('Você está recebendo este e-mail porque nós recebemos uma solicitação de redefinição de senha da sua conta.');
            $mail->action('Resetar senha', url(config('app.url') . route('password.reset', ['token' => $token, 'email' => $notifiable->getEmailForPasswordReset()], false)));
            $mail->line('Esse link de redefinição de senha expirará em 60 minutos.');
            $mail->line('Caso você não tenha feito esta solicitação, basta ignorar este e-mail.');
            return $mail;
        });
    }
}
