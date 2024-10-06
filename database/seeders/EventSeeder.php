<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        Event::factory(20)
            ->create()
            ->each(function (Event $event) use ($users, $categories) {
                $event->users()->attach($users->random(3)->pluck('id')->toArray());
                $event->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
            });
    }
}
