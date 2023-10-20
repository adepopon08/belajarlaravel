<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    //kalau menggunakan table lain
    // protected $table = 'tb_produk';

    // kalau PK nya bukan id
    // protected $primaryKey = 'id_produk';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'image',
        'body',
    ];

    public function category()
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }
}
