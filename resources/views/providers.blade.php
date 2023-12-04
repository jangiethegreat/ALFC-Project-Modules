<!DOCTYPE html>
<html>
<head>
    <title>Insurance Providers</title>
</head>
<body>
    <div id="providers-list">
        <!-- Placeholder for the list of insurance providers -->
        @foreach ($providers as $provider)
            <a href="{{ route('insurance.products', ['providerId' => $provider->id]) }}">{{ $provider->provider_name }}</a><br>
        @endforeach
    </div>

    <script>
        // Function to update the list of providers
        function updateProvidersList() {
            fetchProviders();
            setInterval(fetchProviders, 5000);
        }

        // Function to fetch providers data and update the view
        function fetchProviders() {
            fetch('/providers')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('providers-list').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching providers:', error);
                });
        }

        // Initial call to update providers list
        updateProvidersList();
    </script>
</body>
</html>
