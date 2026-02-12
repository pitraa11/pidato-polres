<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    use HasFactory;

    /**
     * Eager load relations on every query.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nama_peserta',
        'hp_peserta',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'jenis_kelamin',
        'kelas',
        'foto_formal',
        'nama_ortu',
        'hp_ortu',
        'nama_pengawas',
        'hp_pengawas',
        'tema_pidato',
        'jenjang',
        'alamat',
        'is_verified',
        'nomor_urut',
        'tanggal_tampil',
        'tempat_tampil',
    ];

    /**
     * Get the user that owns the participant data.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
