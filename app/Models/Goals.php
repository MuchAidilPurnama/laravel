<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Goals extends Model
{
    use HasFactory;

     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal_capai',
        'status ENUM',
        'created_at',
        'update_at',
    ];

    // /**
    //  * image
    //  *
    //  * @return Attribute
    //  */
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($image) => asset('/storage/posts/' . $image),
    //     );
    // }
}
