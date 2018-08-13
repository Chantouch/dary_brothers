Hello <i>{{ $customer->full_name }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>

<p><u>Demo object values:</u></p>

<div>
    <p><b>Demo One:</b>&nbsp;Product 1</p>
    <p><b>Demo Two:</b>&nbsp;Product 1</p>
</div>

<p><u>Values passed by With method:</u></p>

<div>
    <p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
    <p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>

<ul>
    @foreach($products as $product)
        <li>{!! $product->name !!}</li>
    @endforeach
</ul>

Thank You,
<br/>
{{ config('app.name', 'Dary Brothers') }}
