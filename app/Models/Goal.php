<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'due_date', 'completed'];

    protected static function boot()
{
    parent::boot();

    static::observe(GoalObserver::class);
}
}
