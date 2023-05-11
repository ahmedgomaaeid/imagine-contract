<?php

namespace App\Console\Commands;

use App\Department;
use App\Worker;
use Illuminate\Console\Command;

class taxs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:taxs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'if user put department at least every day will minus 120 from dues';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $departments = Department::Where('updated_at', '>=', now()->subDay())->get(); // get departments that updated at least one day 
        // save workers id in array one time
        $workers = [];
        foreach($departments as $department){
            if($department->worker_id != 6){
                if(!in_array($department->worker_id, $workers)){
                    $workers[] = $department->worker_id;
                }
            }
        }
        // minus 120 from dues
        foreach($workers as $worker){
            Worker::Where('id', $worker)->first()->decrement('dues', 120);
        }
    }
}
