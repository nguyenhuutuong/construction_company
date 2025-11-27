<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'parent_id',
        'message',
        'is_read',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Get the parent message.
     */
    public function parent()
    {
        return $this->belongsTo(Message::class, 'parent_id');
    }

    /**
     * Get the replies for the message.
     */
    public function replies()
    {
        return $this->hasMany(Message::class, 'parent_id');
    }
}
