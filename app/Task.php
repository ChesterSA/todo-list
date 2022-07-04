<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'is_complete',
        'due_date'
    ];

    public function isLate()
    {
        return Carbon::now()->isAfter($this->due_date) && !$this->is_complete;
    }

    public function getIconAttribute()
    {
        if ($this->is_complete) {
            return '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>';
        } else {
            return '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>';
        }
    }

    public function getDueDateFormattedAttribute()
    {
        return Carbon::parse($this->due_date)->format('H:i j M y') ?? 'None';
    }
}
