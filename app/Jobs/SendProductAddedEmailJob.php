<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendProductAddedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string **/
    private $productName;
    
    /** @var string **/
    private $customerEmail;
    
    public function __construct(string $productName, string $customerEmail) {
        $this->productName = $productName;
        $this->customerEmail = $customerEmail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(3);
        echo "   >>> Email sent to {$this->customerEmail}\n";
    }
}
