<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepel extends Model
{
    use HasFactory;
    protected $table = 'kepel';
    protected $fillable = [
    	'kepel'
    ];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function perizinan()
    {
    	return $this->hasMany(Perizinan::class);
    }
}
