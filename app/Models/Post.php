<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['title', 'body'];

    protected function snippet(): Attribute {
        return Attribute::get(function () {
            return explode("\n\n", $this->body)[0];
        });
    }

    protected function displayBody(): Attribute {
        return Attribute::get(function () {
            return nl2br(htmlspecialchars($this->body));
        });
    }
}
