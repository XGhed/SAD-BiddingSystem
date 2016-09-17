<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProofPayment extends Model
{
    protected $table = 'ProofPayments';
    protected $primaryKey = 'ProofPaymentID';
    public $timestamps = false;

    public function checkoutRequest()
		{
		    return $this->hasOne('App\Models\Admin\checkoutRequest', 'CheckoutRequestID', 'CheckoutRequestID');
		}
}
