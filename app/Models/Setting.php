<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'term_of_warranty',
        'term_of_service',

        "mail_text_status_1",
        "mail_text_status_2",
        "mail_text_status_3",
        "mail_text_status_4",
        "mail_text_status_5",
        "mail_text_status_6",
    ];
}
