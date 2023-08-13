<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Validation\Rule;

class Task extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tasks';
    protected $fillable = ['title', 'description', 'completed','user_id'];

    public static function rules($update = false, $id = null)
    {
        $rules = [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:6',
            'completed' => 'boolean',
        ];

        return $rules;
    }
}