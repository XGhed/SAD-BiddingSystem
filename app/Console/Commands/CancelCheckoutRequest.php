<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use App;
use App\Models\Admin;
use Session;
use Input;
use Response;
use Carbon\Carbon;

class CancelCheckoutRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkoutForfeit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return all the items the customers won to inventory if havent checkout after a week period';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $checkoutRequests = App\Models\Admin\CheckoutRequest::where('Status', '<', 2)->get();

        foreach ($checkoutRequests as $key => $checkoutRequest) {
          $current = Carbon::now('Asia/Manila');

          $checkoutDate = collect(explode(' ', $checkoutRequest->RequestDate));

          $checkoutDate->date = explode('-', $checkoutDate[0]);
          $checkoutDate->time = explode(':', $checkoutDate[1]);

          $checkoutDate = collect([
            'date' => $checkoutDate->date,
            'time' => $checkoutDate->time
            ]);

          $checkDateTime = Carbon::now();
          $checkDateTime->timezone = 'Asia/Manila';
          $checkDateTime->year($checkoutDate['date'][0])->month($checkoutDate['date'][1])->day($checkoutDate['date'][2])
                  ->hour($checkoutDate['time'][0])->minute($checkoutDate['time'][1])->second($checkoutDate['time'][2])
                  ->toDateTimeString();

          if ($current->diffInDays($checkDateTime, false) <= -7){
            //mark joinBids as unpaid
            $joinBids = App\Models\Admin\Joinbid::where('CheckoutRequestID', $checkoutRequest->CheckoutRequestID)->get();
            foreach ($joinBids as $key => $joinbid) {
              $joinbidUnpaid = App\Models\Admin\Joinbid::find($joinbid);
              $joinbidUnpaid->Paid = 0;
              $joinbidUnpaid->save();
            }

            foreach ($checkoutRequest->checkoutRequest_Item as $key => $checkoutRequest_Item) {
              $request_item = App\Models\Admin\CheckoutRequest_Item::find($checkoutRequest_Item->CheckoutRequest_ItemID);
              $request_item->delete();

              $item = App\Models\Admin\Item::find($request_item->ItemID);
              $this->ItemLog(
                  $item,
                  'Checkout request for this item has been forfeited.'
                );
            }

            //send msg
            $thread = new App\Models\Admin\Thread;

            $thread->AccountID = $checkoutRequest->AccountID;
            $thread->Subject = "Checkout Forfeited";
            
            $thread->save();

            $message = new App\Models\Admin\Message;

            $message->ThreadID = $thread->ThreadID;
            $message->DateAndTime = Carbon::now('Asia/Manila');
            $message->Sender = 'Admin';
            $message->Message = "Your checkout on ". $checkoutRequest->RequestDate . " has been forfeited.";

            $message->save();

            $checkoutRequest->delete();
          }
        }
    }

    public function ItemLog($item, $log){
        $history = new App\Models\Admin\ItemHistory;

        $history->ItemID = $item->ItemID;
        $history->Date = Carbon::now('Asia/Manila');
        $history->Log = $log;

        $history->save();
    }
}
