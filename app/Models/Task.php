<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  
    use HasFactory;
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'id_cate',
        'des',
        'img1'
        
    ];
    public function Cate()
    {
        return $this->hasMany(Cate::class);
    }
}
