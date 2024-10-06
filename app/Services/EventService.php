<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventService extends Service
{
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
}
