Hello <i>Test User</i>,
<p>New order has been completed.</p>

<p>Product summary:</p>

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
                <td>{!! $product->name !!}</td>
                <td>
                    @if($product->hasMedia('product-images'))
                        {{ Html::image($product->getMedia('product-images')->first()->getUrl('feature-product'), $product->getMedia('product-images')->first()->name, ['width' => '30px']) }}
                    @else
                        <img src="{{ asset('images/item-02.jpg') }}" alt="{{ $product->name }}" width="30px">
                    @endif
                </td>
                <td>{!! $product->price !!}</td>
                <td>{!! $product->qty !!}</td>
                <td>{!! $product->price * $product->qty !!}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

Thank You,
<br/>
{{ config('app.name', 'Dary Brothers') }}

<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
