<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['appointedDoctor', 'firstName', 'lastName', 'phoneNum', 'email', 'password', 'birthday', 'appointmentDate', 'message'];
}
