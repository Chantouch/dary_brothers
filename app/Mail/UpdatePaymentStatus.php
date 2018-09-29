<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePaymentStatus extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var Customer
     */
    protected $customer;
    /**
     * @var null
     */
    protected $payment;

    /**
     * Create a new message instance.
     *
     * @param Customer $customer
     * @param null $payment
     */
    public function __construct(Customer $customer, $payment = null)
    {
        $this->customer = $customer;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->customer->email, $this->customer->full_name)
            ->from(config('settings.app_email_sender'), ['app_name' => config('settings.app_name')])
            ->subject('Payment status updated.')
//            ->with([
//                'payment' => $this->payment,
//                'customer' => $this->customer
//            ])
            ->markdown('mails.payment-status');
    }
}
