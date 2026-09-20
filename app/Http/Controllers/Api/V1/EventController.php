<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ApiResponse;

    /**
     * GET /api/v1/events
     * يرجع كل الفعاليات الموافق عليها، مع دعم فلترة حسب النوع.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Event::approved()->with('competition');

        if ($request->has('type')) {
            $query->ofType($request->query('type'));
        }

        $events = $query->latest()->get();

        return $this->success($events, 'Events retrieved successfully');
    }

    /**
     * GET /api/v1/events/{event}
     * يرجع تفاصيل فعالية وحدة، مع بيانات المسابقة لو نوعها Competition.
     */
    public function show(Event $event): JsonResponse
    {
        $event->load('competition', 'organization');

        return $this->success($event, 'Event retrieved successfully');
    }
}