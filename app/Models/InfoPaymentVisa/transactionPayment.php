<?php

namespace App\Models\InfoPaymentVisa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionPayment extends Model
{
    use SoftDeletes;
    protected $table = 'transaction_payments';
    protected $guarded = [];
}
