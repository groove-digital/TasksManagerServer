<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Validation\Rule;

class Task extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tasks';
    protected $fillable = ['title', 'description', 'completed','user_id'];

    public static function rules($request = false, $id = null)
    {
        $rules = [
           // 'title' => ['required', 'string', 'min:5', 'max:100','unique:tasks'],
            'title' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:10',
            'completed' => 'boolean',
        ];

        return $rules;
    }
}