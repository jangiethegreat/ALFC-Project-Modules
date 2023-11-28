<!DOCTYPE html>
<html>
<head>
    <title>Computation Rates</title>
    <style>
        .input_sa_limit {
            position: relative;
        }
        .sa_limit {
            width: 100%;
            box-sizing: border-box;
        }

        .first-tr{
            height: 50px;
        }



    </style>
    <script>
        function limitInput(element, maxLimit) {
            if (parseInt(element.value) > maxLimit) {
                element.value = maxLimit;
            }
            calculatePremium(element.closest('tr'));
        }

        function calculatePremium(row) {
            let limitSelect = row.querySelector('.sa_limit');
            let limit = parseFloat(limitSelect.value);
            let rate = parseFloat(row.querySelector('.sa_rate').value);

            if (limitSelect.tagName === 'SELECT') {
                rate = parseFloat(limitSelect.options[limitSelect.selectedIndex].getAttribute('data-rate'));
                limit = parseFloat(limitSelect.value);
            }

            let premium = isNaN(limit) || isNaN(rate) ? '' : (limit * rate).toFixed(2);
            row.querySelector('.assured_premium_due').value = premium;

            calculateNetPremium();
        }

        function calculateNetPremium() {
            let assuredPremiumInputs = document.querySelectorAll('.assured_premium_due');
            let netPremiumInput = document.querySelector('.net_premium');

            let total = 0;
            assuredPremiumInputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });

            netPremiumInput.value = total.toFixed(2);
        }
    </script>
</head>
<body>
    <h1>Computation Rates</h1>
    <div class="container">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Insurance Coverage</th>
                        <th>Limit</th>
                        <th>Rate</th>
                        <th>Premium Due</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupedRates as $coverageName => $rates)
                        <tr>
                            <td>{{ $coverageName }}</td>
                            @if(count($rates->groupBy('insurance_coverage_id')) !== count($rates))
                                <td class="input_sa_limit">
                                    <select class="sa_limit" onchange="calculatePremium(this.closest('tr'))">
                                        <option value="">Select Limit</option>
                                        @foreach($rates as $rate)
                                            <option value="{{ $rate->set_limit }}" data-rate="{{ $rate->set_rate }}">{{ $rate->set_limit }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @else
                                <td class="input_sa_limit">
                                    <input
                                        type="text"
                                        class="sa_limit"
                                        max="{{ $rates->max('set_limit') }}"
                                        onchange="calculatePremium(this.closest('tr'))"
                                        onblur="calculatePremium(this.closest('tr'))"
                                    >
                                </td>
                            @endif
                            <td class="input_sa_rate">
                                <input
                                    type="number"
                                    class="sa_rate"
                                    max="{{ $rates->max('set_rate') }}"
                                    onblur="calculatePremium(this.closest('tr'))"
                                >
                            </td>
                            <td class="input_assured_premium_due"><input type="text" class="assured_premium_due" readonly></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="first-tr">
                        <td colspan="5" style="text-align: right; font-weight: bold;">Net Premium <input type="text" class="net_premium" readonly></td>
                    </tr>
                    <tr class="second-tr">
                        <td colspan="1" style="text-align: center;"><strong>DST</strong></td>
                        <td colspan="1" style="text-align: center;"><strong>VAT</strong></td>
                        <td colspan="1" style="text-align: center;"><strong>LGT</strong></td>
                        <td colspan="1" style="text-align: center;"><strong>RAP</strong></td>
                    </tr>
                    <tr class="third-tr">
                        <td colspan="1" style="text-align: right; font-weight: bold;" class="DST"><input type="text" class="net_premium" readonly></td>
                        <td colspan="1" style="text-align: right; font-weight: bold;" class="VAT"><input type="text" class="net_premium" readonly></td>
                        <td colspan="1" style="text-align: right; font-weight: bold;" class="LGT"><input type="text" class="net_premium" readonly></td>
                        <td colspan="1" style="text-align: right; font-weight: bold;" class="RAP"><input type="text" class="net_premium" readonly></td>
                    </tr>
                </tfoot>
            </table>
        </div>



    </div>



</body>
</html>
