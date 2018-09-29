<?php

namespace App\Jobs;

use App\Mail\OrderCompleted;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendOrderCompleteEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var array
     */
    protected $products;
    private $customer;

    /**
     * Create a new job instance.
     *
     * @param $customer
     * @param array $products
     */
    public function __construct($customer, $products = [])
    {
        $this->products = $products;
        $this->customer = $customer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new OrderCompleted($this->customer, (array)$this->products));
    }
}
