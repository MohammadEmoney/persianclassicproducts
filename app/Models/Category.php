<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, LanguageTrait, NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'names',
        'is_active'
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'names' => 'json',
        'is_active' => 'boolean',
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
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }
}
