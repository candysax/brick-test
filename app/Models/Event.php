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

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d.m.Y H:i'),
        );
    }
}
