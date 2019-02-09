<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Ramsey\Uuid\Uuid;

class UuidBase extends Eloquent
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4();
        });
    }
}
