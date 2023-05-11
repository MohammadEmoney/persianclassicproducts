<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'order',
        'input_type',
        'names',
        'type'
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'names' => 'json',
    ];

    public const TYPES = [
        'advantages' => 'Advantages',
        'physical_characteristics' => 'Physical Characteristics'
    ];

    /**
     * Get the Category's name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getNameAttribute($val)
    {
        switch (config('app.locale')) {
            case 'fa':
                return $this->names["fa"] ?? $val;
                break;

            case 'it':
                return $this->names["it"] ?? $val;
                break;

            default:
                return $val;
                break;
        }
    }

    /**
     *
     * @return HasMany
     */
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
