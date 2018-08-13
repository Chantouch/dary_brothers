<?php

namespace App\Jobs;

use App\Mail\NewOrdered;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendNewOrderedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Customer
     */
    protected $customer;
    /**
     * @var array
     */
    protected $products;

    /**
     * Create a new job instance.
     *
     * @param Customer $customer
     * @param array $products
     */
    public function __construct(Customer $customer, $products = [])
    {
        $this->customer = $customer;
        $this->products = $products;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new NewOrdered($this->customer, $this->products));
    }
}
