<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory, Sluggable, Commentable;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
        'excerpt',
        'featured_image',
        'seo_title',
        'seo_keyword',
        'seo_desc'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function getCreatedAtAttribute($date)
    {
        // full date and time format
        //return Carbon::parse($date)->format('d-M-Y H:i:s');
        return Carbon::parse($date)->format('d-M-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }

    public static function getPostInfo($id, $field_name)
    {
        $post_info = Post::where('status', 'published')->where('id', $id)->first();

        if($post_info)
        {
            return  $post_info->$field_name;
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
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

}
