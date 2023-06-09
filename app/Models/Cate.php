<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
  
    use HasFactory;
    protected $table = 'cate';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function Task()
{
    return $this->hasMany(Task::class);
}
}
