<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Worker;
use DateTime;
use Illuminate\Http\Request;
use App\Services\TimeSlotService;

class PageController extends Controller
{
    public function test(int $interval)
    {
        $start = new DateTime('2024-01-12 08:00');
        $end = new DateTime('2024-01-12 18:00');

        return $this->getTimeSlots($interval, $start, $end);
    }


    private function getTimeSlots(int $interval, DateTime $start, DateTime $end): array
    {
        $startTime = $start->format('H:i');//00:00
        $endTime = $end->format('H:i');
        $timeSlots = [];

        while (strtotime($startTime) <= strtotime($endTime)) {
            $start = $startTime;
            $followingTime = strtotime('+' . $interval . 'minutes', strtotime($startTime));
            $end = date('H:i', $followingTime);
            $startTime = date('H:i', $followingTime);

//            dd($startTime, $endTime);
            if (strtotime($startTime) <= strtotime($endTime)) {

                $timeSlots[] = [
                    'start_time' => $start,
                    'end_time' => $end,
                ];
            }
        }

        return $timeSlots;
    }

    public function index()
    {
        return view('app');
    }


    public function schedule()
    {
        $timeSlots = [
            'monday' => [
                'date' => '2024-12-24',
                'slots' => [
                    ['start_time' => '08:00', 'end_time' => '09:00'],
                    ['start_time' => '09:00', 'end_time' => '00:00'],
                    ['start_time' => '10:00', 'end_time' => '11:00'],
                    ['start_time' => '11:00', 'end_time' => '12:00'],
                ]
            ],

        ];

        return view('pages.schedules')->with('slots', $timeSlots);
    }
}

