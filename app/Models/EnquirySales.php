<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class EnquirySales extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enquiry_sales';

    protected $guarded = [
        'id',
        'created_at',
    ];

    protected static $logName = 'enquiry_sales';
    protected static $logUnguarded = true;
    protected static $logAttributes = ["*"];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
