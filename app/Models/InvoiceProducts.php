<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class InvoiceProducts extends Model
{
    use HasUuids;
    protected $table = 'invoice_product_lines';
}
