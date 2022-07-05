<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'completed_at',
        'due_at'
    ];

    public function isLate(): bool
    {
        return !$this->completed_at && Carbon::now()->isAfter($this->due_at);
    }

    public function getIconAttribute(): string
    {
        if ($this->completed_at) {
            return '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>';
        } else {
            return '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>';
        }
    }

    public function getDueAtFormattedAttribute(): string
    {
        return Carbon::parse($this->due_at)->format('H:i j M y') ?? 'None';
    }
}
