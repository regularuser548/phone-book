<?php

namespace Regularuser548\LaravelPhoneBook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'person_id',
        'number',
    ];

    /**
     * Get the person that owns this phone.
     *
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
