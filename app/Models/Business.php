<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'description', 'category'];

    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }

}
