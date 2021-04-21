<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = 'perizinan';
    protected $fillable = [
    	'kepel_id',
    	'jenis_perizinan',
    	'status',
    ];

    public function kepel()
    {
    	return $this->belongsTo(Kepel::class);
    }

    public function ibip()
    {
    	return $this->hasMany(Ibip::class);
    }
}
