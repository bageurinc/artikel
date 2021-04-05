<?php

namespace Bageur\Artikel\Commands;

use Illuminate\Console\Command;
use Bageur\Artikel\model\artikel;
class upschdule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bageur:artikel-up {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'melakukan pengirimaan ke email dan telegram';

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
        $id = $this->argument('id');
        $find = artikel::find($id);
        \Notification::route('telegram', env('TELEGRAM_CHANNEL'))->notify(new \Bageur\Artikel\Notifications\Go($find));
    }
}
