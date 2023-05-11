<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
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
        'names',
        'attribute_type_id',
        'extra'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'names' => 'json',
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
     * @return AttributeType
     */
    public function attributeType()
    {
        return $this->belongsTo(AttributeType::class);
    }

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
