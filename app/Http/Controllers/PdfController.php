<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Models\Admin;
//use Dompdf\Dompdf;

class PdfController extends Controller
{   
    
    public function index(Request $request){        

        //$dompdf = new Dompdf();
        $checkoutType = array(App\Models\Admin\CheckoutRequest::all()->last());
       

        foreach ($checkoutType as $key) {
            
            if($key->CheckoutType == 'Deliver'){

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.Pdf', [
                    'checkout' => $checkoutType
                ]);
                
                return $dompdf->stream();
             
                return view('customer.Pdf')->with('checkout', $key);  
            }

            else if($key->CheckoutType == 'Pick up'){
                $dompdf = App::make('dompdf.wrapper');
                
                $dompdf->loadView('customer.pdfPickUp', [
                    'checkout' => $checkoutType
                ]);
                return $dompdf->stream(); 
                
                return view('customer.pdfPickUp')->with('checkout', $key);  
            }
            
        }
     
    }
}

