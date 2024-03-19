<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'address', 'phone', 'first_name', 'gender', 'birth_date', 'credit_limit'];
}
