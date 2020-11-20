<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;
    
    protected $fillable = ['customer_name', 'vendor_name', 'description', 'estimate_value'];
 
    public function getEstimateValueAttribute($value)
    {
        return number_format($value, 2, ',', '');
    }
    
    public function getCreatedAtAttribute($value)
    {
        $date = new \DateTime($value);
        return $date->format('d/m/Y H:i');
    }
}
