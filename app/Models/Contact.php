<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    use HasFactory;

    protected $fillable = [
        //'user_id',
        'name',
        'phone',
        'email',
        'address',
    ];

    protected function phone(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $cleanedValue = preg_replace('/[^0-9]/', '', $value);
                
                if (strlen($cleanedValue) == 11) {
                    return preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $cleanedValue);
                }
                
                if (strlen($cleanedValue) == 10) {
                    return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $cleanedValue);
                }

                return $value;
            }
        );
    }
}
