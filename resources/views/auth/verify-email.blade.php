<x-guest-layout>
    <x-slot name="title">Подтверждение эл. почты</x-slot>

    <div class="mb-4 text-sm text-gray-600">
        Спасибо за регистрацию! Прежде чем начать, вам нужно подтвердить свой адрес электронной почты, нажав на ссылку, которую мы только что отправили вам по электронной почте?
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            На адрес электронной почты, указанный вами при регистрации, была отправлена новая ссылка для подтверждения.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Переотправить письмо
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Выйти
            </button>
        </form>
    </div>
</x-guest-layout>
