<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Services\EventService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()
            ->with('categories')
            ->with('users')
            ->orderBy('start_time');

        return view('events.index', [
            'allEvents' => $events->paginate(10),
            'publicEvents' => $events->where('is_hidden', false)->paginate(10),
        ]);
    }

    public function indexPersonal(): View
    {
        $events = auth()->user()
            ->events()
            ->with('categories')
            ->with('users')
            ->orderBy('start_time')
            ->paginate(10);

        return view('events.index-personal', compact('events'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('events.create', compact('categories'));
    }

    public function store(StoreEventRequest $request, EventService $service): RedirectResponse
    {
        $event = $service->store($request->all());

        return redirect()->route('events.show', $event);
    }

    public function show(Event $event): View
    {
        $event->load('categories', 'users');

        return view('events.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        $event->load('categories');
        $categories = Category::all();

        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Event $event, UpdateEventRequest $request, EventService $service): RedirectResponse
    {
        $service->set($event)->update($request->all());

        return redirect()->route('events.show', $event);
    }

    public function join(Event $event): RedirectResponse
    {
        auth()->user()->events()->attach($event);

        return back();
    }

    public function leave(Event $event): RedirectResponse
    {
        auth()->user()->events()->detach($event);

        return back();
    }

    public function removeUser(Event $event, Request $request): RedirectResponse
    {
        $user = User::query()->findOrFail($request->input('user_id'));
        $user->events()->detach($event);

        return back();
    }

    public function toggle(Event $event): RedirectResponse
    {
        $event->is_hidden = !$event->is_hidden;
        $event->save();

        return back();
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
