<?php

namespace App\Models;

use App\Traits\HasHeart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory, HasHeart;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category_id',
    ];

    // Una pregunta tiene muchas respuestas
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Una pregunta pertenece a una categoría y a un usuario
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // New method to delete hearts when a question is deleted
    protected static function booted()
    {
        static::deleting(function ($question) {
            $question->hearts()->delete();

            $question->comments()->get()->each(function ($comment) {
                $comment->hearts()->delete();
                $comment->delete();
            });

            $question->answers()->get()->each(function ($answer) {
                $answer->hearts()->delete();

                $answer->comments()->get()->each(function ($comment) {
                    $comment->hearts()->delete();
                    $comment->delete();
                });
            });
        });
    }
}
