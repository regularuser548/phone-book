<?php

namespace Regularuser548\LaravelPhoneBook\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Regularuser548\LaravelPhoneBook\Database\Factories\PhoneFactory;


class Phone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'contact_id',
        'number',
    ];

    /**
     * Get the contact that owns this phone.
     *
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public static function newFactory()
    {
        return PhoneFactory::new();
    }
}
