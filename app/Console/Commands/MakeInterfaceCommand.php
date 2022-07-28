<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeInterfaceCommand extends Command
{
    /** Namen des <Cron-Jobs></Cron-Jobs>
     *
     * @var string
     */
    protected $signature = 'command:name';

    /** Beschreibung des <Cron-Jobs></Cron-Jobs>
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
