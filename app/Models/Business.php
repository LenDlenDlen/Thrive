<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'description', 'category', 'goal_amount'];

    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
