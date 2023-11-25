<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction';

    protected $guarded = [
        'trans_id',
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
