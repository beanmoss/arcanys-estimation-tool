<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'user_story_id',
        'description',
        'fifty_estimate_hrs',
        'ninety_estimate_hrs',
        'note'
    ];

    public function userStory()
    {
        return $this->belongsTo('App\Models\UserStory');
    }
}