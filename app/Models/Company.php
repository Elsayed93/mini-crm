<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
        'revenue',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['logo_image_path'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['logo', 'created_at', 'updated_at'];


    public function getLogoImagePathAttribute()
    {
        if ($this->logo == 'company.png') {
            return asset('storage/companies/company.png');
        } else {
            return asset('storage') . substr($this->logo, strlen('public'));
        }
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
