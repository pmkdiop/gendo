<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DateTimeInFrench extends Model
{
    /**
     * Format the date to a long French format (e.g., "23 septembre 2024").
     */
    public function formatDateLong($date)
    {
        if ($date) {
            return Carbon::parse($date)->locale('fr')->isoFormat('LL'); // Long date: 23 septembre 2024
        }
        return null;
    }

    /**
     * Format the date to a short French format (e.g., "23/09/2024").
     */
    public function formatDateShort($date)
    {
        if ($date) {
            return Carbon::parse($date)->locale('fr')->isoFormat('L'); // Short date: 23/09/2024
        }
        return null;
    }

    /**
     * Format the time in 24-hour format (e.g., "15:30").
     */
    public function formatTime($time)
    {
        if ($time) {
            return Carbon::parse($time)->locale('fr')->isoFormat('HH:mm'); // Time: 15:30
        }
        return null;
    }

    /**
     * Format the date and time to a long French format (e.g., "23 septembre 2024 à 15:30").
     */
    public function formatDateTimeLong($dateTime)
    {
        if ($dateTime) {
            return Carbon::parse($dateTime)->locale('fr')->isoFormat('LL [à] HH:mm'); // Long DateTime: 23 septembre 2024 à 15:30
        }
        return null;
    }

    /**
     * Format the date and time to a short French format (e.g., "23/09/2024 15:30").
     */
    public function formatDateTimeShort($dateTime)
    {
        if ($dateTime) {
            return Carbon::parse($dateTime)->locale('fr')->isoFormat('L HH:mm'); // Short DateTime: 23/09/2024 15:30
        }
        return null;
    }

    /**
     * Format only the year (e.g., "2024").
     */
    public function formatYear($date)
    {
        if ($date) {
            return Carbon::parse($date)->locale('fr')->isoFormat('YYYY'); // Year: 2024
        }
        return null;
    }

    /**
     * Format only the month and year (e.g., "septembre 2024").
     */
    public function formatMonthYear($date)
    {
        if ($date) {
            return Carbon::parse($date)->locale('fr')->isoFormat('MMMM YYYY'); // Month and Year: septembre 2024
        }
        return null;
    }
}