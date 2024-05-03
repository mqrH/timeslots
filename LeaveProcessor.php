<?php

namespace App\Models;

use DateTime;

class LeaveProcessor
{
    public static function processLeave($startDate, $duration) {

        $startDateObj = new DateTime($startDate);
        $endDateObj = clone $startDateObj;
        $endDateObj->modify("+$duration days");

        return [
            'start_date' => $startDateObj->format('Y-m-d'),
            'end_date' => $endDateObj->format('Y-m-d')
        ];
    }
}
