<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'tasks_id';

    protected $fillable = ['taskname', 'due_date', 'description', 'users_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
