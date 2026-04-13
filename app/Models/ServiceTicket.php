<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTicket extends Model
{
    protected $table = 'Service_Ticket';

    protected $fillable = [
        'date_wo',
        'branch',
        'no_wo_client',
        'type_wo',
        'client',
        'is_active',
        'teknisi',
    ];

    protected $appends = ['formatted_wo_date'];

    public $timestamps = false;

    public function getFormattedWoDateAttribute()
    {
        return date('d F Y', strtotime($this->date_wo));
    }
}
