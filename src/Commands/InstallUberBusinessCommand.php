<?php
namespace Collinped\Uber\Commands;

use Collinped\Uber\Uber;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InstallUberBusinessCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'uber:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uber Business command to install everything to connect.';

    protected $twilio;

    /**
     * Create a new command instance.
     * @param Uber $uber
     */
    public function __construct(Uber $uber)
    {
        parent::__construct();

        $this->uber = $uber;
    }

    /**
     * Execute the console command.
     */
    public function fire()
    {
        $this->line('Creating a room via Twilio Video with name: '.$this->argument('unique_name'));

//        // Grab options
//        $from = $this->option('from');
//        $url = $this->option('url');
//
//        // Set a default URL if we havent specified one since is mandatory.
//        if (is_null($url)) {
//            $url = 'http://demo.twilio.com/docs/voice.xml';
//        }
//
//        $this->twilio->call($this->argument('phone'), $url, [], $from);
    }

    /**
     * Proxy method for Laravel 5.1+
     */
    public function handle()
    {
        return $this->fire();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['unique_name', InputArgument::REQUIRED, 'The phone number that will receive a test message.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['url', null, InputOption::VALUE_OPTIONAL, 'Optional url that will be used to fetch xml for call.', null],
            ['from', null, InputOption::VALUE_OPTIONAL, 'Optional from number that will be used.', null],
        ];
    }
}
