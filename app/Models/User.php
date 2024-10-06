<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\Role as RoleEnum;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, SoftDeletes, Notifiable, Searchable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_banned' => 'boolean',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    public function isAdmin(): bool
    {
        return $this->role->id === RoleEnum::ADMIN->value;
    }

    public function isMember(Event $event): bool
    {
        return $this->events->contains($event);
    }

    public function ban(): User
    {
        $this->is_banned = true;

        return $this;
    }

    public function unban(): User
    {
        $this->is_banned = false;

        return $this;
    }

    public function scopeNotAdmin(Builder $query): void
    {
        $query->where('role_id', '<>', RoleEnum::ADMIN->value);
    }

    public function scopeBanned(Builder $query): void
    {
        $query->where('is_banned', true);
    }

    public function scopeNotBanned(Builder $query): void
    {
        $query->where('is_banned', false);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('not_banned', function (Builder $builder) {
            $builder->notBanned();
        });
    }

    #[SearchUsingFullText(['name', 'email'])]
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
