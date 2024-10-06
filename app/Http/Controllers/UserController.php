<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(UserService $service): View
    {
        return view('users.index', $service->index());
    }

    public function ban(User $user): RedirectResponse
    {
        $user->ban()->save();

        return back();
    }

    public function unban(int $user): RedirectResponse
    {
        $user = User::query()->withoutGlobalScope('not_banned')->find($user);
        $user->unban()->save();

        return back();
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return back();
    }
}
