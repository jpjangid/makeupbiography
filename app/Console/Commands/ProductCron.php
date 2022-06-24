<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ContactUs;

class ProductCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $contacts = ContactUs::where('flag', '0')->get();
        foreach ($contacts as $contact) {
            $contact->flag   =   '1';
            $contact->update();
        }
    }
}
