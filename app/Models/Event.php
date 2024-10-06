<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_hidden' => 'boolean',
        'start_time' => 'datetime',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function isHidden(): bool
    {
        return $this->is_hidden;
    }

    public function formatedStartTime()
    {
        return $this->start_time->format('d.m.Y H:i');
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value) : null,
        );
    }
}
