<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibip extends Model
{
    use HasFactory;
    protected $table = 'ibip';
    protected $fillable = [
    	'perizinan_id',
    	'user_id',
    	'hari_tanggal_berangkat',
    	'jam_berangkat',
    	'hari_tanggal_kembali',
    	'jam_kembali',
    	'keterangan',
    ];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
