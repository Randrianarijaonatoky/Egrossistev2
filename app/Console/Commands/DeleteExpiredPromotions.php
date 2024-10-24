<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Models\Promotion;

class DeleteExpiredPromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:delete-expired-promotions';


    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Execute the console command.
     */


     protected $signature = 'promotions:cleanup';
     protected $description = 'Supprime les promotions expirées où date_fin est égale à createdAt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Promotion::deleteExpiredPromotions();
        $this->info('Promotions expirées supprimées.');
    }
}
