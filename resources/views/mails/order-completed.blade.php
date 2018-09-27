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
        <tr>
            <td>Test product</td>
            <td>
                <img src="{{ asset('images/item-02.jpg') }}" alt="Test product" width="30px">
            </td>
            <td>32482$</td>
            <td>32482</td>
        </tr>
    @endif
    </tbody>
</table>

Thank You,
<br/>
{{ config('app.name', 'Dary Brothers') }}
