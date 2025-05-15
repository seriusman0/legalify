<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';
    protected $primaryKey = 'id_kategori';
    
    protected $fillable = [
        'nama_kategori',
        'deskripsi_kategori'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'id_kategori', 'id_kategori');
    }
}
