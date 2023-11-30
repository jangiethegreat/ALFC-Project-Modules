@extends('layouts.app')

@section('content')

<style>
    .agent-header   {
        color: #332727; font-family: Montserrat; font-size: 40px; font-style: normal; font-weight: 1000; line-height: normal; text-align: center; margin-top: 30px;
    }
    .agent-profile{
        color: #4A4A4A; font-family: Montserrat; font-size: 20px; font-style: normal; font-weight: 500; line-height: normal; height: 23px; flex-shrink: 0; margin-top: 56px; margin-bottom: 56px;
    }
    .agent-profile-desc{
        width: 577px; flex-shrink: 0; color: #414141; font-family: Montserrat; font-size: 12px; font-style: normal; font-weight: 500; line-height: normal;
    }
    .botborder{
        border-bottom: 1px solid #E2E2E2;
    }

    .invalid-inputs {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }

    .custom-input{
        height: 38px;
        background: #E4E4E4;
    }

    .form-control custom-input{
        border: none;

    }

    @media screen and (max-width: 767px) {

        .text-small{
        font-size:11px;

            }
        .text-card{
            font-size:13px;
        }
        .text-smaller{
            font-size:11px;
        }

        .hidden-mobile {
            visibility: visible !important; /* Adding !important to ensure higher specificity */
        }
    }







</style>


<div class="container mt-5" >
        <div class="row justify-content-center" >
            <div class="col-md-10">
                <div class="card" >
                    <div class="card-body">
                        <h2 class="agent-header"> Sedan Quotation Form</h2>

                        <div>
                            <p class="agent-profile">Insured Details<br><span class="agent-profile-desc">Please input the information of the insured in the designated fields below.</span></p>
                            <p class="botborder col-md-12"></p>
                        </div>

                        <div class="row row-space">
                            <div class="col-md-12 mb-3">
                                <label class="input-label label">Insured’s Full Name</label>
                                <input type="text" id="insured_full_name" name="insured_full_name" class="form-control custom-input" >
                                @error('insured_full_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-md-3 mb-3">
                                <label class="input-label label">Car Classification</label>
                                <input type="text" id="car_classification" name="car_classification" class="form-control custom-input" >
                                @error('car_classification')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="input-label label">Car Category</label>
                                <input type="text" id="car_category" name="car_category" class="form-control custom-input" >
                                @error('car_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="input-label label">Unit Model</label>
                                <input type="text" id="unit_model" name="unit_model" class="form-control custom-input" >
                                @error('unit_model')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="input-label label">Plate No.</label>
                                <input type="text" id="plate_no" name="plate_no" class="form-control custom-input" >
                                @error('plate_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <p class="agent-profile">Coverage Limits and Rates<br><span class="agent-profile-desc">Please input the limits per coverage and the rate the designated fields below.</span></p>
                            <p class="botborder col-md-12"></p>
                        </div>

                        {{-- Own Damage / Theft Row Input Field --}}
                        <div class="row row-space">
                            <div class="col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-smaller input-label label">OWN DAMAGE/THEFT</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center form-floating">
                                <label class="text-card input-label label">LIMIT</label>
                                <input type="text" id="odt_limit" name="odt_limit" class="form-control custom-input" style="height: 38px;" oninput="validateOwnDamageLimit(this)">
                                <div class="invalid-inputs odt-invalid-inputs">
                                </div>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label">RATE</label>
                                <input type="text" id="odt_rate" name="odt_rate" class="form-control custom-input" oninput="validateOwnDamageRate(this)" >
                                <div class="invalid-inputs odtrate-invalid-inputs">

                                </div>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label">PREMIUM DUE</label>
                                <input type="text" id="odt_premium_due" name="odt_premium_due" class="form-control custom-input"  readonly>
                            </div>
                        </div>


                        {{-- Bodily Injury Input Field --}}
                        <div class ="row row-space">
                            <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-smaller input-label label">BODILY INJURY</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                <select id="bi_limit" name="bi_limit" class="form-control custom-input">
                                    <option disabled="disabled" selected="selected">Select Limit</option>
                                    @foreach ($bodilyInjuryComputations as $computation)
                                        <option value="{{ $computation->bodilyInjurySetLimit }}"
                                            data-rate="{{ $computation->bodilyInjurySetRate }}"
                                            data-id="{{ $computation->id }}">
                                        {{ $computation->bodilyInjurySetLimit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                <input type="text" id="bi_rate" name="middle_name" class="form-control custom-input" >

                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                <input type="text" id="bi_premium_due" name="bi_premium_due" class="form-control custom-input">
                            </div>
                        </div>

                        {{-- Property Damage Input Field --}}
                        <div class ="row row-space">
                            <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-smaller input-label label">PROPERTY DAMAGE</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                <select id="pd_limit" name="pd_limit" class="form-control custom-input">
                                    <option disabled="disabled" selected="selected">Select Limit</option>
                                    @foreach ($propertyDamageComputations as $propertyDamageComputation)
                                        <option value="{{
                                            $propertyDamageComputation->propertyDamageSetLimit }}"
                                            data-rate="{{ $propertyDamageComputation->propertyDamageSetRate }}"
                                            data-id="{{ $propertyDamageComputation->id }}">
                                        {{ $propertyDamageComputation->propertyDamageSetLimit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                <input type="text" class="form-control custom-input" >
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                <input type="text" id="pd_premium_due" name="pd_premium_due" class="form-control custom-input" >
                            </div>
                        </div>

                        {{-- AUTO-PA Input Field --}}
                        <div class="row row-space">
                            <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-smaller input-label label">AUTO-PA-5 SEATS</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                <input type="text" id="aps_limit" name="aps_limit" class="form-control custom-input" value="{{ $autoPaComputations->first()->autoPaSetLimit }}" >

                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-small input-label label">SEATING CAPACITY</label>
                                <input type="text" id="aps_seating_capacity" name="aps_seating_capacity" class="form-control custom-input" >

                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                <input type="text" id="aps_premium_due" name="aps_premium_due" class="form-control custom-input" >

                            </div>
                        </div>

                        {{-- AOG Input Field --}}
                        <div class ="row row-space">
                            <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">

                                <label class="text-smaller text-card input-label label">AOG</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center form-floating">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                <input type="text" id="aog_limit" name="aog_limit" class="form-control custom-input"  oninput="validateAogLimit(this)">
                                <div class="invalid-inputs aog-invalid-inputs"></div>
                            </div>


                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                <input type="text" id="aog_rate" name="aog_rate" class="form-control custom-input" oninput="validateAogRate(this)">
                                <div class="invalid-inputs aograte-invalid-inputs"></div>
                            </div>
                            <div class="col-6 col-sm-3 col-md-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                <input type="text" id="aog_premium_due" name="aog_premium_due" class="form-control custom-input" >

                            </div>
                        </div>

                        {{-- LGT and Premium Due Field --}}
                        <div class ="row row-space">
                            <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                            </div>

                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                            </div>
                            <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >

                            </div>
                            <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">NET PREMIUM</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                            </div>
                        </div>

                        {{-- Computation Due Field --}}
                        <div class ="row row-space">
                            <div class="col-sm-6 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-card input-label label">Computations</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label ">DST</label>
                                <input type="text" id="last_name" name="last_name" class="form-control custom-input" >

                            </div>


                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">VAT</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                            </div>
                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">RAP</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                            </div>
                        </div>

                        {{-- Gross Premium Field --}}
                        <div class ="row row-space">
                            <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                            </div>

                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                            </div>
                            <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">LGT</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >
                            </div>
                            <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">GROSS PREMIUM</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >
                            </div>
                        </div>

                        {{-- Discount and Net Premium Field --}}
                        <div class ="row row-space">
                            <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                            </div>
                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                            </div>

                            <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">DISCOUNT</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                            </div>

                            <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label">NET</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >
                            </div>

                        </div>


                        <div>
                            <p class="agent-profile">Full Commission/Revenue<br><span class="agent-profile-desc">Please input the necessary details for computation in the designated fields below.</span></p>
                            <p class="botborder col-md-12"></p>
                        </div>

                        <div class="row">
                            <!-- First card container for dynamic fields -->
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body" id="dynamicFieldsContainer">
                                        <div class="row row-space" id="initialInputs">
                                            <div class="col-6 col-sm-3 col-md-6 d-flex flex-column align-items-center">
                                                <label class="input-label label">Deductions</label>
                                                <input type="text" class="form-control custom-input" >
                                            </div>
                                            <div class="col-6 col-sm-3 col-md-6 d-flex flex-column align-items-center">
                                                <label class="input-label label">Amount</label>
                                                <input type="text" class="form-control custom-input" >
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-danger" id="addFieldBtn">Add</button>
                                                <button class="btn btn-secondary ml-2" id="deleteFieldBtn" style="background-color: transparent; border: none; color: red;" onclick="this.blur()" disabled>
                                                    Delete
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second card container for label and form -->
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row row-space">
                                            <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                <label class="text-card input-label label">Total Expenses</label>
                                            </div>
                                            <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                <label class="input-label label">Computations</label>
                                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                            </div>
                                        </div>
                                        <div class="row row-space">
                                            <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                <label class="text-card input-label label">VAT</label>
                                            </div>
                                            <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                <label class="input-label label"></label>
                                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                            </div>
                                        </div>
                                        <div class="row row-space">
                                            <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                <label class="text-card input-label label">Sales Credit</label>
                                            </div>
                                            <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                <label class="input-label label"></label>
                                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                            </div>
                                        </div>
                                        <div class="row row-space">
                                            <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                <label class="text-card input-label label">Sales Credit %</label>
                                            </div>
                                            <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                <label class="input-label label"></label>
                                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Button Addition Function --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let originalInputs = document.getElementById('initialInputs').cloneNode(true);
            let addedFieldContainers = [];

            document.getElementById('addFieldBtn').addEventListener('click', function () {
                let newFieldsContainer = document.createElement('div');
                newFieldsContainer.className = 'row row-space';

                let newField1 = document.createElement('div');
                newField1.className = 'col-6 col-sm-3 col-md-6 mb-3 d-flex align-items-center justify-content-center';
                newField1.innerHTML = '<input type="text" class="form-control custom-input" >';

                let newField2 = document.createElement('div');
                newField2.className = 'col-6 col-sm-3 col-md-6 mb-3 d-flex align-items-center justify-content-center';
                newField2.innerHTML = '<input type="text" class="form-control custom-input" >';

                newFieldsContainer.appendChild(newField1);
                newFieldsContainer.appendChild(newField2);

                let addButton = document.getElementById('addFieldBtn');
                addButton.parentNode.insertBefore(newFieldsContainer, addButton.parentNode.firstChild);

                addedFieldContainers.push(newFieldsContainer);
                updateDeleteButton();
            });

            document.getElementById('deleteFieldBtn').addEventListener('click', function () {
                if (addedFieldContainers.length > 0) {
                    let lastAddedContainer = addedFieldContainers.pop();
                    lastAddedContainer.remove();
                    updateDeleteButton();
                } else {
                    // When all added fields are deleted, restore the original inputs
                    let dynamicFieldsContainer = document.getElementById('dynamicFieldsContainer');
                    dynamicFieldsContainer.innerHTML = '';
                    dynamicFieldsContainer.appendChild(originalInputs.cloneNode(true));
                }
            });

            function updateDeleteButton() {
                let deleteButton = document.getElementById('deleteFieldBtn');
                deleteButton.disabled = addedFieldContainers.length === 0;
            }
        });
    </script>


    {{--Own Damage Function --}}
    <script>

        //Fetch the value of ownDamageSetLimit from the database
        let ownDamageSetLimit = @json($ownDamageComputations->pluck('ownDamageSetLimit')->first());

        //Fetch the value of ownDamageSetRate from the database
        let ownDamageSetRate = @json($ownDamageComputations->pluck('ownDamageSetRate')->first());
        let ownDamageRate = ownDamageSetRate * 100; //Convert ownDamageSetRate to Decimal

        // Funtion for Own Damage Limit
        function validateOwnDamageLimit(input) {
            const numericValue = Number(input.value.replace(/[^\d.]/g, '')); // Retrieve the value from an HTML input element and remove any non-numeric characters
            const formattedValue = numericValue.toLocaleString('en-US'); //Put comma in the value

            // Convert ownDamageSetLimit to a formatted string with specified fraction digits Ex. 500000.000000 to 500,000
            const formattedOwnDamageLimit = parseFloat(ownDamageSetLimit).toLocaleString('en-US',
            {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });

            //Check if numericValue is greater than ownDamageSetLimit
            if (numericValue > ownDamageSetLimit) {

                //Show error message after the condition is met
                input.classList.add('is-invalid');

                // Show an error message for rate exceeding the value of formattedOwnDamageLimit
                document.querySelector('.odt-invalid-inputs').innerText = `Please enter a value less than or equal to ${formattedOwnDamageLimit}`;

            } else {

                //Remove error message after clearing the inputted value
                input.classList.remove('is-invalid');

                // Remove the error message for rate exceeding the value of formattedOwnDamageLimit
                document.querySelector('.odt-invalid-inputs').innerText = '';

            }

            // Update input value with formatted value
            input.value = formattedValue;
        }

        // Funtion for Own Damage Rate
        function validateOwnDamageRate(input) {
            let value = input.value.trim(); // Remove leading/trailing spaces in inputted value
            let parsedValue = parseFloat(value); // Parse the trimmed value to a floating-point number

            // Convert ownDamageSetRate to a formatted string with specified digits Ex. 0.018(0.017500000) to  1.75
            const formattedOwnDamageRate = parseFloat(ownDamageRate).toLocaleString('en-US');

            //!isNaN function check if the parsedValue is really a number
            if (!isNaN(parsedValue)) {

                //Check if parsedValue is greater than formattedOwnDamageRate
                if (parsedValue > formattedOwnDamageRate) {

                    //Show error message after the condition is met
                    input.classList.add('is-invalid');

                    // Show an error message for rate exceeding the value of formattedOwnDamageRate
                    document.querySelector('.odtrate-invalid-inputs').innerText = 'Please enter a value less than or equal to ' + formattedOwnDamageRate + '%';

                } else {

                    //Remove error message after clearing the inputted value
                    input.classList.remove('is-invalid');

                    // Remove the error message for rate exceeding the value of formattedOwnDamageLimit
                    document.querySelector('.odtrate-invalid-inputs').innerText = '';
                }

            } else if (value === ''){
                // If parsedValue is empty (input field is empty)
                // Remove error styling and message for empty input
                input.classList.remove('is-invalid');
                document.querySelector('.odtrate-invalid-inputs').innerText = '';

            }

            else {
                //Show error message after the condition is met
                input.classList.add('is-invalid');

                // Show an error message for invalid input
                document.querySelector('.odtrate-invalid-inputs').innerText = 'Please enter only numeric values in this field.';
            }
        }

        // Funtion to convert the value of ODT from Decimal to Percent
        function convertToDecimalPercentageODT() {
            let input = document.getElementById('odt_rate'); //get the inputted value
            let value = input.value.trim(); // Remove leading/trailing spaces
            let parsedValue = parseFloat(value);

            //convert it to percentage
            if (!isNaN(parsedValue)) {
                let decimalValue = parsedValue / 100;
                input.value = parsedValue + '%';
                decimalValue.toFixed(4);
                calculatePremiumDueODT(decimalValue);
            }

        }

        //Calculate the Premium due of the Own Damage / Theft
        function calculatePremiumDueODT(decimalValue) {
            let limit = parseFloat(document.getElementById('odt_limit').value.replace(/\D/g, ''));

            if (!isNaN(limit) && !isNaN(decimalValue)) {
                let premiumDue = (limit * decimalValue).toFixed(2);
                document.getElementById('odt_premium_due').value = parseFloat(premiumDue).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
        }

        //Show the Value of the premium due and put a percent sign in the rate when pressing enter
        document.getElementById('odt_rate').addEventListener('change', function (event) {
            validateOwnDamageRate(this); // Check the rate validity
            let value = this.value.trim(); // Remove leading/trailing spaces
            let parsedValue = parseFloat(value);

            if (!isNaN(parsedValue) && parsedValue <= ownDamageRate) {
                convertToDecimalPercentageODT();
            }
        });

    </script>

    {{--Bodily Injury Function --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var select = document.getElementById("bi_limit");
            var biPremiumDueInput = document.getElementById("bi_premium_due");

            for (var i = 0; i < select.options.length; i++) {
                var value = select.options[i].value;
                if (!isNaN(value)) {
                    select.options[i].text = formatNumber(value);
                }
            }

            function formatNumber(number) {
                return new Intl.NumberFormat('en-US').format(parseInt(number).toFixed(0));
            }

            select.addEventListener("change", function() {
                var selectedLimit = parseFloat(this.value);
                var selectedRate = parseFloat(this.options[this.selectedIndex].getAttribute("data-rate"));

                var premiumDue = selectedLimit * selectedRate;
                biPremiumDueInput.value = premiumDue.toLocaleString('en-US',
                { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 });


            });
        });
    </script>

    {{-- Property Damage Function --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var select = document.getElementById("pd_limit");
            var biPremiumDueInput = document.getElementById("pd_premium_due");

            for (var i = 0; i < select.options.length; i++) {
                var value = select.options[i].value;
                if (!isNaN(value)) {
                    select.options[i].text = formatNumber(value);
                }
            }

            function formatNumber(number) {
                return new Intl.NumberFormat('en-US').format(parseInt(number).toFixed(0));
            }

            select.addEventListener("change", function() {
                var selectedLimit = parseFloat(this.value);
                var selectedRate = parseFloat(this.options[this.selectedIndex].getAttribute("data-rate"));

                var premiumDue = selectedLimit * selectedRate;
                biPremiumDueInput.value = premiumDue.toLocaleString('en-US',
                { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 });


            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let apsLimit = document.getElementById("aps_limit");
            let seatingCapacity = document.getElementById("aps_seating_capacity");
            let apsPremiumDueInput = document.getElementById("aps_premium_due");

            // Formatting the apsLimit value and updating the input field with the formatted result
            let formattedApsLimit = parseFloat(apsLimit.value).toLocaleString('en-US', {
                style: 'decimal',
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });

            apsLimit.value = formattedApsLimit;

            function calculateApsPremiumDue() {
                let limit = parseFloat(apsLimit.value.replace(/\D/g, ''));
                let premiumDue = (limit * parseFloat(seatingCapacity.value)).toFixed(2);
                apsPremiumDueInput.value = parseFloat(premiumDue).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }

            apsLimit.addEventListener('change', calculateApsPremiumDue);
            seatingCapacity.addEventListener('change', calculateApsPremiumDue);
        });
    </script>





    {{-- AOG Functions --}}
    <script>

        //Fetch the value of ownDamageSetLimit from the database
        let aogSetLimit = @json($aogComputations->pluck('aogSetLimit')->first());
        let aogSetRate = @json($aogComputations->pluck('aogSetRate')->first());
        let aogRate = aogSetRate * 100; //Convert ownDamageSetRate to Decimal


        function validateAogLimit(input) {
            const numericValue = Number(input.value.replace(/[^\d.]/g, ''));
            const formattedValue = numericValue.toLocaleString('en-US');

            const formattedAOGLimit = parseFloat(aogSetLimit).toLocaleString('en-US',
            {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });

            if (numericValue > aogSetLimit) {

                input.classList.add('is-invalid');
                document.querySelector('.aog-invalid-inputs').innerText = `Please enter a value less than or equal to ${formattedAOGLimit}`;

            } else {

                input.classList.remove('is-invalid');
                document.querySelector('.aog-invalid-inputs').innerText = '';

            }

            input.value = formattedValue;
        }

        function validateAogRate(input) {
            let value = input.value.trim();
            let parsedValue = parseFloat(value);

            const formattedAOGRate = parseFloat(aogRate).toLocaleString('en-US');

            if (!isNaN(parsedValue)) {

                if (parsedValue > formattedAOGRate) {

                    input.classList.add('is-invalid');
                    document.querySelector('.aograte-invalid-inputs').innerText = 'Please enter a value less than or equal to ' + formattedAOGRate + '%';

                } else {

                    input.classList.remove('is-invalid');
                    document.querySelector('.aograte-invalid-inputs').innerText = '';

                }

            } else if (value === ''){
                input.classList.remove('is-invalid');
                document.querySelector('.aograte-invalid-inputs').innerText = '';

            }

            else {
                input.classList.add('is-invalid');
                document.querySelector('.aograte-invalid-inputs').innerText = 'Please enter only numeric values in this field.';
            }
        }

        function convertToDecimalPercentageAOG() {
            let input = document.getElementById('aog_rate');
            let value = input.value.trim();
            let parsedValue = parseFloat(value);

            //convert it to percentage
            if (!isNaN(parsedValue)) {
                let decimalValue = parsedValue / 100;
                input.value = parsedValue + '%';
                decimalValue.toFixed(4);
                calculatePremiumDueAOG(decimalValue);
            }

        }

        //Calculate the Premium due of the Own Damage / Theft
        function calculatePremiumDueAOG(decimalValue) {
            let limit = parseFloat(document.getElementById('aog_limit').value.replace(/\D/g, ''));

            if (!isNaN(limit) && !isNaN(decimalValue)) {
                let premiumDue = (limit * decimalValue).toFixed(2);
                document.getElementById('aog_premium_due').value = parseFloat(premiumDue).toLocaleString('en-US',
                {
                    minimumFractionDigits: 2, maximumFractionDigits: 2
                });
            }
        }

        document.getElementById('aog_rate').addEventListener('change', function (event) {

            validateAogRate(this);
            let value = this.value.trim();
            let parsedValue = parseFloat(value);
            if (!isNaN(parsedValue) && parsedValue <= aogRate) {
                convertToDecimalPercentageAOG();
            }

        });




    </script>






@endsection
