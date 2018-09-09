<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCompleted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var Product
     */
    protected $products;
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = $this->customer->email;
        $subject = 'Your order has been completed at: ' . Carbon::now();
        $name = config('settings.app_name');

        $headerData = [
            'category' => 'category',
            'unique_args' => [
                'variable_1' => 'abc'
            ]
        ];

        $header = $this->asString($headerData);

        $this->withSwiftMessage(function ($message) use ($header) {
            $message->getHeaders()
                ->addTextHeader('X-SMTPAPI', $header);
        });

        return $this->to($address, $this->customer->full_name)
            ->view('mails.order-completed')
            // ->text('mails.ordered-plain')
            ->from(config('settings.app_email'), $name)
            //->cc($address, $name)
            //->bcc($address, $name)
            //->replyTo($address, $name)
            ->subject($subject)
            ->with([
                'products' => $this->products,
                'customer' => $this->customer
            ]);
//            ->attach(asset('images/shop-item-09.jpg'), [
//                'as' => 'item.jpg',
//                'mime' => 'image/jpeg',
//            ]);
    }

    /**
     * @param $data
     * @return null|string|string[]
     */
    public function asJSON($data)
    {
        $json = json_encode($data);
        $json = preg_replace('/(["\]}])([,:])(["\[{])/', '$1$2 $3', $json);

        return $json;
    }

    /**
     * @param $data
     * @return string
     */
    public function asString($data)
    {
        $json = $this->asJSON($data);

        return wordwrap($json, 76, "\n   ");
    }
}
