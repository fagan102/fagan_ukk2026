<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengaduan;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'pengaduan_id',
        'isi_feedback'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}