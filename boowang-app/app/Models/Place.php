<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 *
 * @property $id
 * @property $category_id
 * @property $nama
 * @property $alamat
 * @property $deskripsi
 * @property $image
 * @property $harga_tiket
 * @property $jam_buka
 * @property $jam_tutup
 * @property $jumlah_tiket_weekday
 * @property $jumlah_tiket_weekend
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Place extends Model
{
    
    protected $perPage = 10;
    protected $with = ['category'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['category_id', 'nama', 'gmaps_link', 'alamat', 'deskripsi', 'image', 'harga_tiket', 'jam_buka', 'jam_tutup', 'jumlah_tiket_weekday', 'jumlah_tiket_weekend'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'nama';
    // }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(function ($query) use ($search) { 
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            })
        );
        
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category' ,function ($query) use ($category) { 
                $query->where('nama', $category);
            })
        );
    }
}
