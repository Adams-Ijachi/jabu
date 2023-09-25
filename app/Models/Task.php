<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
        'iteration_count',
        'description',
        'task_group_id',
        'task_frequency_id',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
        'iteration_count' => 'integer',
        'status' => TaskStatusEnum::class
    ];

//    protected function startDate(): Attribute
//    {
//        return Attribute::make(
//            get: fn (string $value) => \Carbon\Carbon::parse($value)->format('Y-m-d'),
//        );
//    }
//    protected function endDate(): Attribute
//    {
//        return Attribute::make(
//            get: fn (string $value) => \Carbon\Carbon::parse($value)->format('Y-m-d'),
//        );
//    }

        // get db date and format it to Y-m-d
    public function getDbStartDateAttribute() : string
    {

        return \Carbon\Carbon::parse($this->start_date)->format('Y-m-d');
    }

    public function getDbEndDateAttribute() : string
    {
        return \Carbon\Carbon::parse($this->end_date)->format('Y-m-d');
    }

    public function taskGroup() : BelongsTo
    {
        return $this->belongsTo(TaskGroup::class);
    }

    public function taskFrequency() : BelongsTo
    {
        return $this->belongsTo(TaskFrequency::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
