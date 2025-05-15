<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id_service';
    
    protected $fillable = [
        'nama_service',
        'deskripsi',
        'id_kategori',
        'harga',
        'bonus',
        'durasi',
        'status'
    ];

    protected $casts = [
        'tanggal_dibuat' => 'datetime',
        'tanggal_diperbarui' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'id_kategori', 'id_kategori');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            $service->tanggal_dibuat = now();
            $service->tanggal_diperbarui = now();
        });

        static::updating(function ($service) {
            $service->tanggal_diperbarui = now();
        });
    }
}
