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


<div class="container" >
        <div class="row justify-content-center" >
            <div class="col-md-10">
                <div class="card" >
                    <div class="card-body">
                        <h2 class="agent-header"> Sedan Quotation Form   </h2>
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
                                <input type="text" id="bi_limit" name="last_name" class="form-control custom-input" >
                            </div>


                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                <input type="text" id="bi_rate" name="middle_name" class="form-control custom-input" >

                            </div>
                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                            </div>
                        </div>

                        {{-- Property Damage Input Field --}}
                        <div class ="row row-space">
                            <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-smaller input-label label">PROPERTY DAMAGE</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                <input type="text" id="last_name" name="last_name" class="form-control custom-input" >
                                <div class="invalid-feedback">

                                </div>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                            </div>
                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >
                            </div>
                        </div>

                        {{-- AUTO-PA Input Field --}}
                        <div class="row row-space">
                            <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                <label class="text-smaller input-label label">AUTO-PA-5 SEATS</label>
                            </div>

                            <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                <input type="text" id="aps_limit" name="aps_limit" class="form-control custom-input" >

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
                                <input type="text" id="aog_rate" name="aog_rate" class="form-control custom-input" >

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

        let ownDamageSetLimit = @json($ownDamageComputations->pluck('ownDamageSetLimit')->first());
        let ownDamageSetRate = @json($ownDamageComputations->pluck('ownDamageSetRate')->first());
        let ownDamageRate = ownDamageSetRate * 100;

        function validateOwnDamageLimit(input) {
            const numericValue = Number(input.value.replace(/[^\d.]/g, ''));
            const formattedValue = numericValue.toLocaleString('en-US');
            const formattedOwnDamageLimit = parseFloat(ownDamageSetLimit).toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 });

            if (numericValue > ownDamageSetLimit) {
                input.classList.add('is-invalid');
                // Show an error message for rate exceeding the value of formattedOwnDamageLimit
                document.querySelector('.odt-invalid-inputs').innerText = `Please enter a value less than or equal to ${formattedOwnDamageLimit}`;
            } else {
                //Remove error message after clearing the inputted value
                input.classList.remove('is-invalid');
                document.querySelector('.odt-invalid-inputs').innerText = '';
            }

            // Update input value with formatted value
            input.value = formattedValue;
        }

        function validateOwnDamageRate(input) {
            let value = input.value.trim(); // Remove leading/trailing spaces
            let parsedValue = parseFloat(value);
            const formattedOwnDamageRate = parseFloat(ownDamageRate).toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 });

            if (!isNaN(parsedValue)) {
                if (parsedValue > formattedOwnDamageRate) {
                    input.classList.add('is-invalid');
                    // Show an error message for rate exceeding the value of formattedOwnDamageRate
                    document.querySelector('.odtrate-invalid-inputs').innerText = 'Please enter a value less than or equal to ' + formattedOwnDamageRate + '%';
                } else {
                    //Remove error message after clearing the inputted value
                    input.classList.remove('is-invalid');
                    document.querySelector('.odtrate-invalid-inputs').innerText = '';
                }
            } else {
                input.classList.remove('is-invalid');
                // Show an error message for invalid input
                document.querySelector('.odtrate-invalid-inputs').innerText = '';
            }
        }

        function convertToDecimalPercentageODT() {
            let input = document.getElementById('odt_rate');
            let value = input.value.trim(); // Remove leading/trailing spaces
            let parsedValue = parseFloat(value);

            if (!isNaN(parsedValue)) {
                let decimalValue = parsedValue / 100;
                input.value = parsedValue + '%';
                decimalValue.toFixed(4);
                calculatePremiumDueODT(decimalValue);
            }
        }

        function calculatePremiumDueODT(decimalValue) {
            let limit = parseFloat(document.getElementById('odt_limit').value.replace(/\D/g, ''));

            if (!isNaN(limit) && !isNaN(decimalValue)) {
                let premiumDue = (limit * decimalValue).toFixed(2);
                document.getElementById('odt_premium_due').value = parseFloat(premiumDue).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }
        }

        document.getElementById('odt_rate').addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                validateOwnDamageRate(this); // Check the rate validity
                let value = this.value.trim(); // Remove leading/trailing spaces
                let parsedValue = parseFloat(value);
                if (!isNaN(parsedValue) && parsedValue <= ownDamageRate) {
                    convertToDecimalPercentageODT();
                }
            } else {
                validateOwnDamageRate(this); // Call the rate validation function on each keyup event
            }
        });

    </script>


    {{-- AOG Functions --}}
    <script>

        let aogSetLimit = 300000.000000000;

        function validateAogLimit(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            let formattedValue = Number(value).toLocaleString('en-US'); // Format to have commas


                if (value > aogSetLimit) {
                    input.classList.add('is-invalid');
                    document.querySelector('.aog-invalid-inputs').innerText = 'Please enter a value less than or equal to ' + aogSetLimit.toLocaleString('en-US');
                } else {
                    input.classList.remove('is-invalid');
                document.querySelector('.aog-invalid-inputs').innerText = '';                }

                input.value = formattedValue;
            }

            document.getElementById('aog_rate').addEventListener('keyup', function (event) {
                if (event.key === 'Enter') {
                    convertToDecimalPercentage();
                }
            });

            function convertToDecimalPercentage() {
                let input = document.getElementById('aog_rate');
                let value = input.value.trim(); // Remove leading/trailing spaces
                let parsedValue = parseFloat(value);

                if (!isNaN(parsedValue)) {
                    let decimalValue = parsedValue / 100;
                    input.value = parsedValue + '%';
                    decimalValue.toFixed(4);
                    calculatePremiumDue(decimalValue);
                }
            }

            function calculatePremiumDue(decimalValue) {
                let limit = parseFloat(document.getElementById('aog_limit').value.replace(/\D/g, ''));

                if (!isNaN(limit) && !isNaN(decimalValue)) {
                    let premiumDue = (limit * decimalValue).toFixed(4);
                    document.getElementById('aog_premium_due').value = premiumDue;
                }
            }


    </script>






@endsection
