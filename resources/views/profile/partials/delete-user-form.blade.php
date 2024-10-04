<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Удаление аккаунта
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            После удаления аккаунта, все ваши ресурсы и данные будут утеряны.<br>
            Их нельзя восстановить.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Удалить аккаунт</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-medium text-gray-900">
                Вы уверены, что хотите удалить аккаунт?
            </h2>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="Введите пароль"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Отмена
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Удалить аккаунт
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
