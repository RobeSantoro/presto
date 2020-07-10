<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    protected $fillable = [
        'product_name',
        'product_description',
        'user_id',
        'img',
        'category_id'
    ];

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'altro' => 'annuncio announcement'
        ];

        // Customize array...

        return $array;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

}
