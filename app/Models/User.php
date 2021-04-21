<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kepel_id',
        'nip',
        'name',
        'no_siswa',
        'email',
        'no_telp',
        'password',
        'kelas',
        'kegiatan',
        'gedung',
        'kamar_gedung',
        'mess',
        'kamar_mess',
        'gedung_flat',
        'gedung_flat_in',
        'group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kepel()
    {
        return $this->belongsTo(Kepel::class);
    }

    public function ibip()
    {
        return $this->hasOne(Ibip::class);
    }
}
