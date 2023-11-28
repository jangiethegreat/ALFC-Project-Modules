<!DOCTYPE html>
<html>
<head>
    <title>Display Insurance Providers</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Coverage Type</th>
                    <th>Limit</th>
                    <th>Rate</th>
                    <th>Premium Due</th>
                    <th>Net Rate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insurance_computation_rates as $insurance_computation_rate)
                    <tr>
                        <td>{{ $insurance_computation_rate->coverage_type }}</td>
                        <td class="input_sa_limit"><input type="text" class="sa_limit"></td>
                        <td class="input_sa_rate"><input type="text" class="sa_rate"></td>
                        <td class="input_assured_premium_due"><input type="text" class="assured_premium_due" readonly></td>
                        <td><input type="text" value="{{ $insurance_computation_rate->net_rate }}" class="net_rate" readonly></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function() {
            $('.sa_limit, .sa_rate').on('input', function() {
                var $row = $(this).closest('tr');
                var saLimit = parseFloat($row.find('.sa_limit').val().replace(/,/g, ''));
                var saRate = parseFloat($row.find('.sa_rate').val().replace(/,/g, ''));

                if (!isNaN(saLimit) && !isNaN(saRate)) {
                    var premiumDue = saLimit * saRate / 100; // Adjusted calculation
                    var formattedPremiumDue = premiumDue.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    $row.find('.assured_premium_due').val(formattedPremiumDue);
                } else {
                    $row.find('.assured_premium_due').val('');
                }
            });
        });
    </script>


</body>
</html>
