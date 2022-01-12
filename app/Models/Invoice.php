<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $guarded = ['id'];
    
    public function detail(){
        $this->hasMany(InvoiceDetail::class, 'invoice_id');
    }
}
