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
}
