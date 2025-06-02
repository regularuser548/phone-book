<?php

namespace Regularuser548\LaravelPhoneBook\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Regularuser548\LaravelPhoneBook\Database\Factories\ContactFactory;

class Contact extends Model
{
    use HasFactory;

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
     * Get all phones for this contact.
     *
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

    public static function newFactory()
    {
        return ContactFactory::new();
    }
}
