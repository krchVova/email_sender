<?php

namespace App\Console\Commands;

use App\Services\Senders\SenderService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SenderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sender:email {--time=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var \App\Services\Senders\SenderService
     */
    private SenderService $sender;

    /**
     * SenderCommand constructor.
     */
    public function __construct()
    {
        $this->sender = new SenderService();

        parent::__construct();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Carbon::setTestNow($this->timeValidation());

        $this->sender->send();
    }

    /**
     * @return \Carbon\Carbon|\DateTime
     */
    private function timeValidation()
    {
        if($this->option('time') == null) {
            return Carbon::now()->toDateTime();
        }

        return Carbon::createFromTimeString($this->option('time'));
    }
}
