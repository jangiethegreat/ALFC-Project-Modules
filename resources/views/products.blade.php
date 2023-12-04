<!-- categories.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Provider Products</title>
</head>
<body>
    <h1>Products for the Provider</h1>
    @if(count($products) > 0)
        <ul>
            @foreach($products as $product)
                <li>
                    <a href="{{ route('insurance.computation_rates', ['providerId' => $providerId, 'productId' => $product->id]) }}">
                        {{ $product->product_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No products found for this provider.</p>
    @endif
</body>
</html>
