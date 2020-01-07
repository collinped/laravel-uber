<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class UploadUsersToUberBusiness implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param Writer $writer
     * @param  Storage  $storage
     * @return void
     * @link https://developer.uber.com/docs/businesses/data-automation/employees#requirements
     */
    public function handle(Writer $writer, Storage $storage)
    {
        // Create the Spreadsheet
        $records = [
            ['foo', 'bar', 'baz'],
            ['john', 'doe', 'john.doe@example.com'],
        ];

        //load the CSV document from a string
        $csv = $writer->createFromString('');

        //insert all the records
        $csv->insertAll($records);

        echo $csv->getContent(); //returns the CSV document as a string
        //Store the Spreadsheet

        //Upload to Uber Business
        $storage->disk('sftp');
    }
}
