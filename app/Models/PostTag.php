<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'tag_id',
        'post_tag_post_idx',
        'post_tag_tag_idx',
        'post_tag_post_fk',
        'post_tag_tag_fk'
    ];
}
