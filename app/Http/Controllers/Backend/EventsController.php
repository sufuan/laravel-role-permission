<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EventsController extends Controller
{
    public function index()
    {
        return view('backend.pages.events.index');
    }

    public function refetchEvents(Request $request)
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        try {
            Log::info('Store event request', $request->all());

            $validatedData = $this->validateEventRequest($request);

            $event = new Event();
            $this->fillEventData($event, $validatedData);
            $event->save();

            return response()->json(['success' => 'Event saved successfully.']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Error saving event', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to save event.'], 500);
        }
    }

    public function show(Event $event)
    {
        return response()->json($event);
    }

    public function edit(Event $event)
    {
        return response()->json($event);
    }

    public function update(Request $request, Event $event)
    {
        try {
            Log::info('Update event request', $request->all());

            $validatedData = $this->validateEventRequest($request);

            $this->fillEventData($event, $validatedData);
            $event->save();

            return response()->json(['success' => 'Event updated successfully.']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Error updating event', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to update event.'], 500);
        }
    }

    public function destroy(Event $event)
    {
        try {
            $event->delete();
            return response()->json(['success' => 'Event deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('Error deleting event', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to delete event.'], 500);
        }
    }

    protected function validateEventRequest(Request $request)
    {
        $isAllDay = $request->input('is_all_day');
        $startDateFormat = $isAllDay ? 'Y-m-d' : 'Y-m-d H:i';
        $endDateFormat = $isAllDay ? 'Y-m-d' : 'Y-m-d H:i';

        return $request->validate([
            'title' => 'required|string|max:255',
            'startDate' => ['required', 'date_format:' . $startDateFormat],
            'endDate' => ['required', 'date_format:' . $endDateFormat, 'after_or_equal:startDate'],
            'is_all_day' => 'required|boolean',
            'description' => 'nullable|string',
        ], [
            'endDate.after_or_equal' => 'The end date must be a date after or equal to start date.',
        ]);
    }

    protected function fillEventData(Event $event, array $validatedData)
    {
        $event->title = $validatedData['title'];
        $event->start = $validatedData['startDate'];
        $event->end = $validatedData['endDate'];
        $event->is_all_day = $validatedData['is_all_day'];
        $event->description = $validatedData['description'];
    }
}
