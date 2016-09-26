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

class ItemWonOneWeekReturn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oneWeekForfeit';

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
        $winners = App\Models\Admin\Winner::whereHas('item', function($query){
          $query->whereHas('checkoutRequest_item', function($query){}, '<', 1);
        })->get();

        foreach ($winners as $key => $winner) {
          $current = Carbon::now('Asia/Manila');

          $eventEnded = collect(explode(' ', $winner->auction->EndDateTime));

          $eventEnded->date = explode('-', $eventEnded[0]);
          $eventEnded->time = explode(':', $eventEnded[1]);

          $eventEnded = collect([
            'date' => $eventEnded->date,
            'time' => $eventEnded->time
            ]);

          $endDateTime = Carbon::now();
          $endDateTime->timezone = 'Asia/Manila';
          $endDateTime->year($eventEnded['date'][0])->month($eventEnded['date'][1])->day($eventEnded['date'][2])
                  ->hour($eventEnded['time'][0])->minute($eventEnded['time'][1])->second($eventEnded['time'][2])
                  ->toDateTimeString();

          if ($current->diffInDays($endDateTime, false) <= -7){
            $item = App\Models\Admin\Item::find($winner->ItemID);
            $this->ItemLog(
              $item,
              'Item forfeited. Going back to inventory.'
              );

            //send msg
            $thread = new App\Models\Admin\Thread;

            $thread->AccountID = $winner->AccountID;
            $thread->Subject = "Item Forfeited";
            
            $thread->save();

            $message = new App\Models\Admin\Message;

            $message->ThreadID = $thread->ThreadID;
            $message->DateAndTime = Carbon::now('Asia/Manila');
            $message->Sender = 'Admin';
            $message->Message = "Item ". $item->itemModel->ItemName . " that you won on " .  $winner->auction->EndDateTime
              . " has been forfeited.";

            $message->save();

            //delete item_auction
            $item_auction = App\Models\Admin\Item_Auction::find($winner->ItemID);
            $item_auction->delete();

            //delete winner
            $winner = App\Models\Admin\Winner::find($winner->WinnerID);
            $winner->delete();
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
