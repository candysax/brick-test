<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\AbstractPaginator;

class UserService extends Service
{
    const USERS_PER_PAGE = 6;

    public function index(): array
    {
        $users = $this->getPaginatedUsers('users', function () {
            return $this->builder()->notBanned();
        });

        $bannedUsers = $this->getPaginatedUsers('banned', function () {
            return $this->builder()->withoutGlobalScope('not_banned')->banned();
        });

        return [
            'users' => $users,
            'bannedUsers' => $bannedUsers
        ];
    }

    private function builder(): Builder
    {
        return User::query()
            ->orderBy('created_at', 'DESC')
            ->where('id', '<>', auth()->user()->id)
            ->notAdmin();
    }

    private function getPaginatedUsers(string $pageName, callable $queryBuilder): AbstractPaginator
    {
        $currentPage = request()->input($pageName, 1);

        $query = $queryBuilder();
        $users = $query->paginate(self::USERS_PER_PAGE, ['*'], $pageName, $currentPage);

        if ($users->isEmpty() && $currentPage > 1) {
            $users = $query->paginate(self::USERS_PER_PAGE, ['*'], $pageName, $users->lastPage());
        }

        return $users->withQueryString();
    }
}
