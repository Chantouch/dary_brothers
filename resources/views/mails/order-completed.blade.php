Hello <i>{{ $customer->fullname }}</i>,
<p>Thanks for order our product.</p>

<p>Your product is processing to delivery soon.</p>

<p>Below is your product:</p>

<table class="table" id="customers">
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
                <td>{!! $product->model->name !!}</td>
                <td>
                    @if($product->model->hasMedia('product-images'))
                        {{ Html::image($product->model->getMedia('product-images')->first()->getUrl('feature-product'), $product->model->getMedia('product-images')->first()->name, ['width' => '30px']) }}
                    @else
                        <img src="{{ asset('images/item-02.jpg') }}" alt="{{ $product->model->name }}" width="30px">
                    @endif
                </td>
                <td>{!! $product->model->price !!}</td>
                <td>{!! $product->qty !!}</td>
                <td>{!! number_format($product->model->price * $product->qty, 2) !!}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

Thank You,
<br/>
{{ config('app.name', 'Dary Brothers') }}

<style>
    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td, table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
