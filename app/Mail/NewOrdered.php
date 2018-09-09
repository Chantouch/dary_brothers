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
        $address = $this->customer->email;
        $subject = 'An Order has been submitted to your store at: ' . Carbon::now();
        $name = $this->customer->full_name;

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

    /**
     * @param $data
     * @return null|string|string[]
     */
    private function asJSON($data)
    {
        $json = json_encode($data);
        $json = preg_replace('/(["\]}])([,:])(["\[{])/', '$1$2 $3', $json);

        return $json;
    }


    private function asString($data)
    {
        $json = $this->asJSON($data);

        return wordwrap($json, 76, "\n   ");
    }
}
