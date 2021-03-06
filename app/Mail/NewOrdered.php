<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrdered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var Customer
     */
    protected $customer;
    /**
     * @var Product
     */
    protected $products;

    /**
     * Create a new message instance.
     *
     * @param Customer $customer
     * @param $products
     */
    public function __construct(Customer $customer, $products = [])
    {
        $this->customer = $customer;
        $this->products = $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = config('settings.app_email_sender');
        $subject = 'An Order has been submitted to your store at: ' . Carbon::now();
        $name = isset($this->customer->full_name) ? $this->customer->full_name : 'Customer';
        return $this->to(config('settings.app_email'), config('settings.app_name'))
            ->view('mails.new-ordered')
            ->text('mails.ordered-plain')
            ->from($address, $name)
            //->cc($address, $name)
            //->bcc($address, $name)
            //->replyTo($address, $name)
            ->subject($subject)
            ->with([
                'customer' => $this->customer,
                'products' => $this->products
            ]);
//            ->attach(asset('images/shop-item-09.jpg'), [
//                'as' => 'item.jpg',
//                'mime' => 'image/jpeg',
//            ]);
    }
}
