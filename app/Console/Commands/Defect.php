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

class Defect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'defect';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert a defect.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $defect = new App\Models\Admin\ItemDefect;

        $defect->DefectName = "NewDefect";
        $defect->save();
    }
}
