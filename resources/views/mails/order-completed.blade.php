Hello <i>{{ $customer->full_name }}</i>,
<p>Thanks for order our product.</p>

<p>Your product is processing to delivery soon.</p>

<p>Below is your product:</p>

<table class="table">
    <thead>
    <tr>
        <th>Product name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($products) && count($products))
        @foreach($products as $index => $product)
            <tr>
                <td>{!! $product->name !!}</td>
                <td>
                    @if($product->model->hasMedia('product-images'))
                        {{ Html::image($product->model->getMedia('product-images')->first()->getUrl('feature-product'), $product->model->getMedia('product-images')->first()->name, ['width' => '30px']) }}
                    @else
                        <img src="{{ asset('images/item-02.jpg') }}" alt="{{ $product->name }}" width="30px">
                    @endif
                </td>
                <td>{!! $product->price !!}</td>
                <td>{!! $product->price * $product->qty !!}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

Thank You,
<br/>
{{ config('app.name', 'Dary Brothers') }}
