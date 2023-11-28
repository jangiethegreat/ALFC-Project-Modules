<!-- categories.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Provider Categories</title>
</head>
<body>
    <h1>Categories for the Provider</h1>
    @if(count($categories) > 0)
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('insurance.computation_rates', ['providerId' => $providerId, 'categoryId' => $category->id]) }}">
                        {{ $category->category_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No categories found for this provider.</p>
    @endif
</body>
</html>
