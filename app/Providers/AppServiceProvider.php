<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        JsonResource::withoutWrapping();

        VerifyEmail::toMailUsing(function (object $notifiable, string $verificationLink) {
            return (new MailMessage())
                ->subject('Подтвердите свой адрес эл. почты')
                ->line('Прежде чем продолжить, пожалуйста, подтвердите свой адрес электронной почты, перейдя по ссылке ниже:')
                ->action('Подтвердить', $verificationLink)
                ->line('Если вы не создавали учетную запись, никаких дальнейших действий не требуется.');
        });
    }
}
