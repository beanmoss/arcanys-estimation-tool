<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'developer_number',
        'sprint_length',
        'workload_team_size_addition_per_dev',
        'status',
        'is_archived'
    ];

    public function authors()
    {
        return $this->hasMany('App\Models\Author');
    }

    public function userStories()
    {
        return $this->hasMany('App\Models\UserStory');
    }

    public function additionalTimeRequirements()
    {
        return $this->hasMany('App\Models\AdditionalTimeRequirement');
    }

}