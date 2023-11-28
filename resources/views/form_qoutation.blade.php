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
    margin-top: -20px;
    margin-bottom: 20px;
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
        color:red;
    }

    .hidden-mobile {
        visibility: visible !important; /* Adding !important to ensure higher specificity */
    }
}




</style>


<div class="container mt-5 mb-5">
        <div class="row justify-content-center" >
            <div class="col-md-10">
                <form>
                    @csrf
                    <div class="card" >
                        <div class="card-body">
                            <h2 class="agent-header"> Sedan Quotation Form </h2>
                            <div>
                            <p class="agent-profile">Insured Details<br><span class="agent-profile-desc">Please input the information of the insured in the designated fields below.</span></p>
                            <p class="botborder col-md-12"></p>
                            </div>

                            <div class="row row-space">
                                <div class="col-md-12 mb-3">
                                    <label class="input-label label">Insured’s Full Name</label>
                                    <input type="text" id="insured_full_name" name="insured_full_name" class="form-control" style="height: 38px; background: #F4F4F4;">
                                </div>
                            </div>

                            <div class="row row-space">
                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Car Classification</label>
                                    <input type="text" id="car_classification" name="car_classification" class="form-control" style="height: 38px; background: #F4F4F4;">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Car Category</label>
                                    <input type="text" id="car_category" name="car_category" class="form-control" style="height: 38px; background: #F4F4F4;">

                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Unit Model</label>
                                    <input type="text" id="unit_model" name="unit_model" class="form-control" style="height: 38px; background: #F4F4F4;">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Plate No.</label>
                                    <input type="text" id="plate_no" name="plate_no" class="form-control" style="height: 38px; background: #F4F4F4;">
                                </div>
                            </div>


                            <div>
                            <p class="agent-profile">Coverage Limits and Rates<br><span class="agent-profile-desc">Please input the limits per coverage and the rate the designated fields below.</span></p>
                            <p class="botborder col-md-12"></p>
                            </div>

                            {{-- Own Damage/Theft Input Fields --}}
                            <div class="row row-space">
                                <div class="col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-smaller input-label label">OWN DAMAGE/THEFT</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label">LIMIT</label>
                                    <input type="text" id="odt_limit" name="odt_limit" class="form-control" style="height: 38px; background: #F4F4F4;">
                                </div>

                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label">RATE</label>
                                    <input type="text" id="odt_rate" name="odt_rate" class="form-control" style="height: 38px; background: #F4F4F4;">

                                </div>

                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label">PREMIUM DUE</label>
                                    <input type="text" id="odt_premium_due" name="odt_premium_due" class="form-control" style="height: 38px; background: #F4F4F4;">

                                </div>
                            </div>

                            {{-- Bodily Injury Input Fields --}}
                            <div class ="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-smaller input-label label">BODILY INJURY</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <input type="text" id="bi_limit" name="last_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>


                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                    <input type="text" id="bi_rate" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                            </div>

                            {{-- Property Damage Input Fields --}}
                            <div class ="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-smaller input-label label">PROPERTY DAMAGE</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>


                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                            </div>

                            {{-- Auto-PA Input Fields --}}
                            <div class="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-smaller input-label label">AUTO-PA- 5 SEATS</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <input type="text" id="aps_limit" name="aps_limit" class="form-control" style="height: 38px; background: #F4F4F4;">

                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-small input-label label">SEATING CAPACITY</label>
                                    <input type="text" id="aps_seating_capacity" name="aps_seating_capacity" class="form-control" style="height: 38px; background: #F4F4F4;">

                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="aps_premium_due" name="aps_premium_due" class="form-control" style="height: 38px; background: #F4F4F4;">

                                </div>
                            </div>

                            {{-- AOG Input Fields --}}
                            <div class ="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">

                                    <label class="text-smaller text-card input-label label">AOG</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>


                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                                <div class="col-6 col-sm-3 col-md-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                            </div>

                            {{-- LGT and Net Premium Input Fields --}}
                            <div class ="row row-space">
                                <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                </div>

                                {{-- LGT Input Fields --}}
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">LGT</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>

                                {{-- Net Premium Input Fields --}}
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">NET PREMIUM</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">
                                </div>

                            </div>

                            <div class ="row row-space">

                                <div class="col-sm-6 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-card input-label label">Computations</label>
                                </div>

                                {{-- VAT Input Fields --}}
                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label ">VAT</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" style=" height: 38px; background: #F4F4F4;">
                                </div>

                                {{-- DISCOUNT Input Fields --}}
                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">RAP</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">
                                </div>

                                {{-- RAP Input Fields --}}
                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">GROSS PREMIUM</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">
                                </div>

                            </div>


                            <div class ="row row-space">
                                <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                </div>

                                {{-- DISCOUNT Input Fields --}}
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">DISCOUNT</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

                                </div>
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">NET</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style=" height: 38px; background: #F4F4F4;">

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
                                                <div class=" col-6 col-sm-3 col-md-6  d-flex flex-column align-items-center ">
                                                    <label class="input-label label">Deductions</label>
                                                    <input type="text" class="form-control" style="height: 38px; background: #F4F4F4;">
                                                </div>
                                                <div class=" col-6 col-sm-3 col-md-6 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Amount</label>
                                                    <input type="text" class="form-control" style="height: 38px; background: #F4F4F4;">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12 text-right">
                                                    <button class="btn btn-danger" id="addFieldBtn">Add</button>
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
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style="height: 38px; background: #F4F4F4;">

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                    <label class="text-card input-label label">VAT</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style="height: 38px; background: #F4F4F4;">

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                    <label class="text-card input-label label">Sales Credit</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style="height: 38px; background: #F4F4F4;">

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-center">
                                                    <label class="text-card input-label label">Sales Credit %</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control" style="height: 38px; background: #F4F4F4;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('addFieldBtn').addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default form submission

                var newFieldsContainer = document.createElement('div');
                newFieldsContainer.className = 'row row-space';

                var newField1 = document.createElement('div');
                newField1.className = 'col-6 col-sm-4 col-md-6 mb-3 d-flex align-items-center justify-content-center';
                newField1.innerHTML = '<input type="text" class="form-control" style="height: 38px; background: #F4F4F4;">';

                var newField2 = document.createElement('div');
                newField2.className = 'col-6 col-sm-4 col-md-6 mb-3 d-flex align-items-center justify-content-center';
                newField2.innerHTML = '<input type="text" class="form-control" style="height: 38px; background: #F4F4F4;">';

                newFieldsContainer.appendChild(newField1);
                newFieldsContainer.appendChild(newField2);

                var addButton = document.getElementById('addFieldBtn');
                addButton.parentNode.insertBefore(newFieldsContainer, addButton.parentNode.firstChild);
            });
        });
    </script>


@endsection
