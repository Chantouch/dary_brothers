<?php

namespace App\Jobs;

use App\Mail\UpdatePaymentStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendPaymentStatusEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer;
    /**
     * @var null
     */
    protected $payment;

    /**
     * Create a new job instance.
     *
     * @param $customer
     * @param null $payment
     */
    public function __construct($customer, $payment = null)
    {
        $this->customer = $customer;
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new UpdatePaymentStatus($this->customer, $this->payment));
    }
}
