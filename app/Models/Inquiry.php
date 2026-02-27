<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'subject',
        'message',
        'product_id',
        'quantity',
        'project_description',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
