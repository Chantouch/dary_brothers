<h3>Customer Information</h3>
<p>Username: {{ $customer->fullname }}</p>,
<p>Phone number: {{ $customer->phone_number }}</p>
<p>Address: {{ $customer->address }}</p>
<p>New order has been completed.</p>

<p>Product summary:</p>

<table class="table" id="customers">
    <thead>
    <tr>
        <th>#</th>
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
                <td>{{ $index + 1 }}</td>
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
                <td>{!! $product->model->price * $product->qty !!}</td>
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
