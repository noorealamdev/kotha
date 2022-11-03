<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'category_slug',
        'status'
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public static function getCategoryInfo($id, $field_name)
    {
        $category_info = Category::where('status', 1)->where('id', $id)->first();

        if($category_info)
        {
            return  $category_info->$field_name;
        }
        else
        {
            return  '';
        }

    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
}
