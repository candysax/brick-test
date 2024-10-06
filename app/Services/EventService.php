<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class EventService extends Service
{
    public function index(): array
    {
        return [
            'allEvents' => $this->builder()->paginate(10),
            'publicEvents' => $this->builder()->where('is_hidden', false)->paginate(10),
        ];
    }

    public function store(array $data): Event
    {
        return DB::transaction(function () use ($data) {
            $event = Event::query()->create($this->params($data));
            $event->categories()->sync(array_values($data['event_categories'] ?? []));

            return $event;
        });
    }

    public function update(array $data): Event
    {
        return DB::transaction(function () use ($data) {
            $this->model->update($this->params($data));
            $this->model->categories()->sync(array_values($data['event_categories'] ?? []));

            return $this->model;
        });
    }

    private function params(array $data): array
    {
        return [
            'name' => $data['event_name'],
            'start_time' => $data['event_start_time'],
            'link' => $data['event_link'],
            'description' => $data['event_description'],
        ];
    }

    private function builder(): Builder
    {
        return Event::query()
            ->with('categories', 'users')
            ->orderBy('start_time');
    }
}
