<?php

namespace Regularuser548\PhoneBook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'surname',
    ];

    /**
     * Get all phones for this person.
     *
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
