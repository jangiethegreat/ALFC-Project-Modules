@extends('layouts.app')

@section('content')

<style>
    .form-title   {
        color: #332727;
        font-family: Montserrat-Bold;
        font-size: 40px;
        font-style: normal;
        line-height: normal;
        text-align: center;
        margin-top: 30px;
    }
    .title-details{
        color: #4A4A4A;
        font-family: Montserrat-Medium;
        font-size: 20px;
        font-style: normal;
        line-height: normal;
        height: 23px;
        flex-shrink: 0;
        margin-top: 56px;
        margin-bottom: 56px;
    }
    .title-desc{
        width: 100%;
        flex-shrink: 0;
        color: #414141;
        font-family: Montserrat-Medium;
        font-size: 10px;
        font-style: normal;
        line-height: normal;
        padding-bottom: 5px;
        border-bottom: 2px solid #D9D9D9;

    }

    .text-smaller{
        font-family: Montserrat;
        color: #626262;
    }

    .text-card{
        font-family: Montserrat;

        color: #626262;
    }


    .invalid-inputs {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
        text-align: center;
    }

    .form-control.custom-input {
        font-size: 13px;
    }


    .custom-input{
        text-align: center;
        height: 38px;
        background: #E4E4E4;
    }

    .form-control custom-input{
        border: none;
    }

    .custom-input:disabled{
        background: #585858;
    }

    .btn-remove {
        background-color: transparent;
        border: none;
        outline: none;
        color: #C7C7C7; /* Change this color to the desired color */
        font-size: 11px;
    }

    .btn-remove:hover {
        font-weight: bold;
        color: #c81515; /* Change this color to the desired hover text color */
        cursor: pointer; /* Show a pointer cursor on hover */
    }

    .btn-add {

        background-color: transparent;
        border: none;
        outline: none;
        color: #B60000;
        font-size: 11px;
    }

    .btn-add:hover {
        font-weight: bold;
        color: #ff7878; /* Change this color to the desired color */
        cursor: pointer; /* Show a pointer cursor on hover */
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




<div class="container mt-5 mb-5" >
        <div class="row justify-content-center" >
            <div class="col-md-10">
                <div class="card pb-5" >

                    <form>

                        @csrf

                        <div class="card-body">
                            <h2 class="form-title"> Sedan Quotation Form</h2>

                            <div class="title-header">
                                <p class="title-details mb-1 mt-sm-2 mt-md-5">Insured Details</p>
                                <p class="title-desc mt-1">Please input the information of the insured in the designated fields below.</p>
                            </div>

                            <div class="row row-space">
                                <div class="col-md-9 mb-3">
                                    <label class="input-label label">Insured’s Full Name</label>
                                    <input type="text" id="insured_full_name" name="insured_full_name" class="form-control custom-input" style="text-align: left;" >
                                    @error('insured_full_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-sm-3 col-md-3  mb-3 ">
                                    <label class="input-label label">Effectivity Date</label>
                                    <select id="effectivity_date" name="effectivity_date" class="form-control custom-input" style="text-align: left; font-size: 13px;">
                                        <option disabled="disabled" selected="selected">Select Effectivity Date</option>
                                        <option value="6 Month">6 Month</option>
                                        <option value="1 Year">1 Year</option>
                                        <option value="2 Year">2 Year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-space">
                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Car Classification</label>
                                    <input type="text" id="car_classification" name="car_classification" class="form-control custom-input" style="text-align: left;">
                                    @error('car_classification')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Car Category</label>
                                    <input type="text" id="car_category" name="car_category" class="form-control custom-input" style="text-align: left;">
                                    @error('car_category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Unit Model</label>
                                    <input type="text" id="unit_model" name="unit_model" class="form-control custom-input" style="text-align: left;">
                                    @error('unit_model')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="input-label label">Plate No.</label>
                                    <input type="text" id="plate_no" name="plate_no" class="form-control custom-input" style="text-align: left;">
                                    @error('plate_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="title-header">
                                <p class="title-details mb-1 mt-5">Coverage Limits and Rates</p>
                                <p class="title-desc mt-1">Please input the limits per coverage and the rate the designated fields below.</p>
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

                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
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
                                    <select id="bi_limit" name="bi_limit" class="form-control custom-input" style="text-align: left; font-size: 13px;">
                                        <option disabled="disabled" selected="selected" >Select Limit</option>
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
                                    <input type="text" id="bi_rate" name="bi_rate" class="form-control custom-input" disabled>

                                </div>

                                <div class="col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="bi_premium_due" name="bi_premium_due" class="form-control custom-input" readonly>
                                </div>
                            </div>

                            {{-- Property Damage Input Field --}}
                            <div class ="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-smaller input-label label">PROPERTY DAMAGE</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <select id="pd_limit" name="pd_limit" class="form-control custom-input" style="text-align: left; font-size: 13px;">
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
                                    <input type="text" class="form-control custom-input" disabled>
                                </div>

                                <div class="col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="pd_premium_due" name="pd_premium_due" class="form-control custom-input" readonly>
                                </div>
                            </div>

                            {{-- AUTO-PA Input Field --}}
                            <div class="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-smaller input-label label">AUTO-PA-5 SEATS</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <input type="text" id="aps_limit" name="aps_limit" class="form-control custom-input" value="{{ $autoPaComputations->isNotEmpty() ? $autoPaComputations->first()->autoPaSetLimit ?? '' : '' }}" >
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label">SEATING CAPACITY</label>
                                    <input type="text" id="aps_seating_capacity" name="aps_seating_capacity" class="form-control custom-input" >

                                </div>

                                <div class="col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="aps_premium_due" name="aps_premium_due" class="form-control custom-input" readonly>

                                </div>
                            </div>

                            {{-- AOG Input Field --}}
                            <div class ="row row-space">
                                <div class="col-sm-3 col-md-3  mt-3 d-flex align-items-center justify-content-center">

                                    <label class="text-smaller text-card input-label label">AOG</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3  mb-3 d-flex flex-column align-items-center form-floating">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">LIMIT</label>
                                    <input type="text" id="aog_limit" name="aog_limit" class="form-control custom-input"  >
                                    <div class="invalid-inputs aog-invalid-inputs"></div>
                                </div>


                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">RATE</label>
                                    <input type="text" id="aog_rate" name="aog_rate" class="form-control custom-input"
                                        value="{{ $aogComputations->isNotEmpty() ? $aogComputations->first()->aogProviderRate : '' }}">
                                    <div class="invalid-inputs aograte-invalid-inputs"></div>
                                </div>

                                                                                                                                
                                <div class="col-sm-3 col-md-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label hidden-mobile" style="visibility: hidden;">PREMIUM DUE</label>
                                    <input type="text" id="aog_premium_due" name="aog_premium_due" class="form-control custom-input" readonly>

                                </div>
                            </div>

                            {{-- Net Premium Field --}}
                            <div class ="row row-space">
                                <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                </div>

                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                </div>
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >

                                </div>
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label">NET PREMIUM</label>
                                    <input type="text" id="net_premium_due" name="net_premium_due" class="form-control custom-input" readonly>
                                </div>
                            </div>

                            {{-- Computation Due Field --}}
                            <div class ="row row-space">
                                <div class="col-sm-6 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                    <label class="text-card input-label label">Computations</label>
                                </div>

                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="text-card input-label label ">DST</label>
                                    <input type="text" id="dst" name="dst" class="form-control custom-input" >

                                </div>


                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">VAT</label>
                                    <input type="text" id="vat" name="vat" class="form-control custom-input" >

                                </div>
                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">RAP</label>
                                    <input type="text" id="rap" name="rap" class="form-control custom-input" >

                                </div>
                            </div>

                            {{-- Gross Premium Field --}}
                            <div class ="row row-space">
                                <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                </div>

                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                </div>
                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    <label class="input-label label">LGT </label>
                                    <select id="lgtSelect" class="form-control custom-input" style="text-align: left; font-size: 13px;" onchange="replaceWithInput()">
                                        <option disabled="disabled" selected="selected">Select LGT percentage</option>
                                        <option value="0.002">NCR - 0.20%</option>
                                        <option value="0.005">Luzon - 0.50%</option>
                                        <option value="0.0075">Visayas - 0.75%</option>
                                        <option value="0.00825">Mindanao - 0.825%</option>
                                    </select>
                                    <input type="text" id="lgtInput" name="lgt" class="form-control custom-input" style="display: none;" onclick="resetLGTSelect()">
                                </div>


                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">GROSS PREMIUM</label>
                                    <input type="text" id="gross_premium" name="gross_premium" class="form-control custom-input" readonly>
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
                                    <input type="text" id="discount" name="discount" class="form-control custom-input" oninput="totalNet()">
                                </div>

                                <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    <label class="text-card input-label label">NET</label>
                                    <input type="text" id="net" name="net" class="form-control custom-input" readonly>
                                </div>

                            </div>

                            <div class="title-header">
                                <p class="title-details mb-1 mt-5">Full Commission/Revenue</p>
                                <p class="title-desc mt-1">Please input the necessary details for computation in the designated fields below.</p>
                            </div>

                            <div class="row">
                                <div class="col-md-5 order-1 order-md-0">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-start">
                                                    <label class="text-card input-label label">Total Expenses</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Computations</label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex justify-content-start">
                                                    <label class="text-card input-label label">VAT</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex justify-content-start">
                                                    <label class="text-card input-label label">Sales Credit</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control custom-input" >

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex justify-content-start">
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

                                <div class="col-md-7 order-0 order-md-1">
                                    <div class="card border-0">
                                        <div class="card-body" id="dynamicFieldsContainer">
                                            <div class="row row-space" id="initialInputs">
                                                
                                                <div class="col-6 col-sm-3 col-md-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Titles</label>
                                                    <select id="title" class="form-control custom-input" style="text-align: left; font-size: 13px;" >
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="BM">BM</option>
                                                        <option value="GM">GM</option>
                                                    </select>
                                                </div>

                                                <div class="col-6 col-sm-3 col-md-5 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Deductions</label>
                                                    <input type="text" class="form-control custom-input" >
                                                </div>

                                                <div class="col-6 col-sm-3 col-md-4 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Amount</label>
                                                    <input type="text" class="form-control custom-input" >
                                                </div>

                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-12 text-right">
                                                    <button class="btn-remove" id="deleteFieldBtn" disabled>
                                                        REMOVE
                                                    </button>
                                                    <button type="button" class="btn-add" id="addFieldBtn">
                                                        ADD FIELD
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Proceed with Quotation Submission</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body ">
                                            Please note that all entered information will be subjected to a thorough validation process before final approval is granted. Once you submit the details, they will be forwarded for review and subsequent approval. Kindly ensure the accuracy and completeness of the information provided, as once the submission is confirmed, no further modifications or edits can be made
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary ml-2" data-dismiss="modal"  style="background-color: transparent; border: none; color: red;" >
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-danger" style="border-radius: 20px;" >Proceed</button>
                                                <!-- Add another button here if needed -->
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
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 ">
            <div style="display: flex; justify-content: flex-end;  margin-bottom:10px;">

                        <button style="border-radius: 18px; background: transparent; width: 203px; height: 39px; flex-shrink: 0; border: none; ;">
                            <span style="color: #B40C0C; font-family: Montserrat; font-size: 15px; font-style: normal; font-weight: 700; line-height: normal;">
                                Cancel
                            </span>
                        </button>

                        <button style="border-radius: 18px; background: #980000; width: 203px; height: 39px; flex-shrink: 0; border: none; margin-left: 10px;" data-toggle="modal" data-target="#exampleModal">
                            <span style="color: #FFF; font-family: Montserrat; font-size: 15px; font-style: normal; font-weight: 700; line-height: normal;">
                                Continue
                            </span>
                        </button>

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
                event.preventDefault();

                let newFieldsContainer = document.createElement('div');
                newFieldsContainer.className = 'row row-space';

                let newField1 = document.createElement('div');
                newField1.className = 'col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center';
                newField1.innerHTML = `
                    <select class="form-control custom-input" style="text-align: left; font-size: 13px;">
                        <option disabled="disabled" selected="selected"></option>
                        <option value="BM">BM</option>
                        <option value="GM">GM</option>
                    </select>
                `;

                let newField2 = document.createElement('div');
                newField2.className = 'col-6 col-sm-3 col-md-5 mb-3 d-flex flex-column align-items-center';
                newField2.innerHTML = '<input type="text" class="form-control custom-input">';

                let newField3 = document.createElement('div');
                newField3.className = 'col-6 col-sm-3 col-md-4 mb-3 d-flex flex-column align-items-center';
                newField3.innerHTML = '<input type="text" class="form-control custom-input">';

                newFieldsContainer.appendChild(newField1);
                newFieldsContainer.appendChild(newField2);
                newFieldsContainer.appendChild(newField3);

                let addButton = document.getElementById('addFieldBtn');
                addButton.parentNode.insertBefore(newFieldsContainer, addButton.parentNode.firstChild);

                addedFieldContainers.push(newFieldsContainer);
                updateDeleteButton();
            });

            document.getElementById('deleteFieldBtn').addEventListener('click', function () {
                event.preventDefault();
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
        let ownDamageSetLimitMinimum = @json($ownDamageComputations->pluck('ownDamageSetLimitMinimum')->first());
        let ownDamageSetLimitMaximum = @json($ownDamageComputations->pluck('ownDamageSetLimitMaximum')->first());

        //Fetch the value of ownDamageSetRate from the database
        // let ownDamageSetRate = @json($ownDamageComputations->pluck('ownDamageSetRate')->first());
        // let ownDamageRate = ownDamageSetRate * 100; //Convert ownDamageSetRate to Decimal
        let ownDamageSetRateMinimum = @json($ownDamageComputations->pluck('ownDamageSetRateMinimum')->first());
        let ownDamageSetRateMaximum = @json($ownDamageComputations->pluck('ownDamageSetRateMaximum')->first());

        let ownDamageRateMaximum = ownDamageSetRateMaximum * 100; //Convert ownDamageSetRate to Decimal
        let ownDamageRateMinimum = ownDamageSetRateMinimum * 100; //Convert ownDamageSetRate to Decimal

        

        // Funtion for Own Damage Limit
        function validateOwnDamageLimit(input) {
            const numericValue = Number(input.value.replace(/[^\d.]/g, '')); // Retrieve the value from an HTML input element and remove any non-numeric characters
            const formattedValue = numericValue.toLocaleString('en-US'); //Put comma in the value
            
            const odtRateInput = document.getElementById('odt_rate');
            const odtRateLabel = document.querySelector('.odtrate-invalid-inputs');
            // Convert ownDamageSetLimit to a formatted string with specified fraction digits Ex. 500000.000000 to 500,000
            const formattedOwnDamageLimitMin = parseFloat(ownDamageSetLimitMinimum).toLocaleString('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });

            const formattedOwnDamageLimitMax = parseFloat(ownDamageSetLimitMaximum).toLocaleString('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            });


            //Check if numericValue is greater than ownDamageSetLimit
            if (numericValue < ownDamageSetLimitMinimum || numericValue > ownDamageSetLimitMaximum) {
                
                // Show error message after the condition is met
                input.classList.add('is-invalid');

                // Show an error message for value outside the range of formattedOwnDamageLimitMin and formattedOwnDamageLimitMax
                document.querySelector('.odt-invalid-inputs').innerText = `Please enter a value between ${formattedOwnDamageLimitMin} and ${formattedOwnDamageLimitMax}`;
                odtRateInput.disabled = true;
                odtRateLabel.innerText = 'Rate input is disabled due to an invalid limit.';

            } else {
                // Remove error message after clearing the inputted value or when within the range
                input.classList.remove('is-invalid');
                document.querySelector('.odt-invalid-inputs').innerText = '';
                odtRateInput.disabled = false;
                odtRateLabel.innerText = '';
            }

            input.value = formattedValue;
        }

        // Funtion for Own Damage Rate
        function validateOwnDamageRate(input) {
            let value = input.value.trim(); // Remove leading/trailing spaces in inputted value
            let parsedValue = parseFloat(value); // Parse the trimmed value to a floating-point number

            // Convert the rate limits to formatted strings with specified digits
            const formattedOwnDamageRateMin = parseFloat(ownDamageRateMinimum).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            const formattedOwnDamageRateMax = parseFloat(ownDamageRateMaximum).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Validate the input value
            if (!isNaN(parsedValue)) {
                // Check if parsedValue is within the specified range
                if (parsedValue >= ownDamageRateMinimum && parsedValue <= ownDamageRateMaximum) {
                    // Remove error message if the value is within the specified range
                    input.classList.remove('is-invalid');
                    document.querySelector('.odtrate-invalid-inputs').innerText = '';
                } else {
                    // Show error message for values outside the specified range
                    input.classList.add('is-invalid');
                    document.querySelector('.odtrate-invalid-inputs').innerText = `Please enter a value between ${formattedOwnDamageRateMin}% and ${formattedOwnDamageRateMax}%`;

                }
            } else if (value === '') {
                // Remove error styling and message for empty input
                input.classList.remove('is-invalid');
                document.querySelector('.odtrate-invalid-inputs').innerText = '';
            } else {
                // Show error message for invalid input
                input.classList.add('is-invalid');
                document.querySelector('.odtrate-invalid-inputs').innerText = 'Please enter only numeric values in this field.';
            }
            

        }

        // Funtion to convert the value of ODT from Decimal to Percent
        function convertToDecimalPercentageODT() {
            let input = document.getElementById('odt_rate');
            let value = input.value.trim();
            let parsedValue = parseFloat(value);

            if (!isNaN(parsedValue)) {
                let decimalValue = parsedValue / 100;
                input.value = parsedValue + '%';
                decimalValue.toFixed(4);
                console.log(parsedValue);
                calculatePremiumDueODT(decimalValue);
            }
        }

        function calculatePremiumDueODT(decimalValue) {
            let limit = parseFloat(document.getElementById('odt_limit').value.replace(/\D/g, ''));

            if (!isNaN(limit) && !isNaN(decimalValue)) {
                let premiumDue = (limit * decimalValue).toFixed(2);
                document.getElementById('odt_premium_due').value = parseFloat(premiumDue).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                updateTotalPremiumDue();
            }
        }

        document.getElementById('odt_rate').addEventListener('change', function (event) {
            validateOwnDamageRate(this);
            let value = this.value.trim();
            let parsedValue = parseFloat(value);

            if (!isNaN(parsedValue) && parsedValue <= ownDamageRateMaximum || parsedValue >= ownDamageRateMinimum) {
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
                updateTotalPremiumDue();

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
                updateTotalPremiumDue();

            });
        });
    </script>

    {{-- AUTO PA Function --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let apsLimit = document.getElementById("aps_limit");
            let seatingCapacity = document.getElementById("aps_seating_capacity");
            let apsPremiumDueInput = document.getElementById("aps_premium_due");

            if (apsLimit.value !== '') {

                // Formatting the apsLimit value and updating the input field with the formatted result
                let formattedApsLimit = parseFloat(apsLimit.value).toLocaleString('en-US', {
                    style: 'decimal',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2
                });

                apsLimit.value = formattedApsLimit;

            }



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
        
        let odtLimitInput = document.getElementById('odt_limit');
        let aogLimitInput = document.getElementById('aog_limit');

        function passValueToAOGLimit() {
            let odtLimitValue = odtLimitInput.value.trim();
            if (!odtLimitInput.classList.contains('is-invalid')) {

                aogLimitInput.value = odtLimitValue;
                calculatePremiumDueAOG(); 
                // Call the conversion function when odt_limit changes
            }
            else {
                aogLimitInput.value = "";
                clearAll();
            }
            
        }

        // Event listener to detect changes in odt_limit and pass its value to aog_limit
        odtLimitInput.addEventListener('change', passValueToAOGLimit);
        odtLimitInput.addEventListener('input', passValueToAOGLimit);

        window.addEventListener('DOMContentLoaded', (event) => {
            convertToPercentageWithSign();
            // console.log(aog_rate.value);
        });

        function convertToPercentageWithSign() {
            let input = document.getElementById('aog_rate');
            let value = input.value.trim();
            let parsedValue = parseFloat(value);

            // Convert to percentage and add '%' sign
            if (!isNaN(parsedValue)) {
                let percentageValue = (parsedValue * 100).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 4
                });

                input.value = percentageValue + '%';           
            }
        }

        //Calculate the Premium due of the Own Damage / Theft
        function calculatePremiumDueAOG() {
            let limit = parseFloat(document.getElementById('aog_limit').value.replace(/\D/g, ''));
            let rate = parseFloat(document.getElementById('aog_rate').value);

            percentageRate = rate / 100;
                

                console.log(percentageRate);
            if (!isNaN(limit) && !isNaN(percentageRate)) {
                let premiumDue = (limit * percentageRate).toFixed(2);
                document.getElementById('aog_premium_due').value = parseFloat(premiumDue).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                updateTotalPremiumDue();
            }
        }
            


    </script>

    <!-- <script>

        //Fetch the value of ownDamageSetLimit from the database
  
        let aogSetRate = @json($aogComputations->pluck('aogProviderRate')->first());
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
                updateTotalPremiumDue();
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
    </script>  -->




    <script>
        function updateTotalPremiumDue() {
            // Retrieve all premium due values and sum them up
            const odtPremiumDue = parseFloat(document.getElementById('odt_premium_due').value.replace(/[^\d.]/g, '')) || 0;
            const biPremiumDue = parseFloat(document.getElementById('bi_premium_due').value.replace(/[^\d.]/g, '')) || 0;
            const pdPremiumDue = parseFloat(document.getElementById('pd_premium_due').value.replace(/[^\d.]/g, '')) || 0;
            const aogPremiumDue = parseFloat(document.getElementById('aog_premium_due').value.replace(/[^\d.]/g, '')) || 0;
            // Calculate the total premium due by summing all premium due values
            totalPremiumDue = odtPremiumDue + biPremiumDue + pdPremiumDue+aogPremiumDue; // Include additional premium due calculations here if needed

            // Update the 'NET PREMIUM' input field with the calculated total
            document.getElementById('net_premium_due').value = totalPremiumDue.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            calculateDST();
            calculateVAT();
            calculateLGT();
            calculateGrossPremium();

        }
    </script>

    <script>

        function calculateDST()
        {
            const totalPremiumDue = parseFloat(document.getElementById('net_premium_due').value.replace(/[^\d.]/g, '')) || 0;

            dstPercentage = 0.125;
            totalDST = totalPremiumDue * dstPercentage ;

            document.getElementById('dst').value = totalDST.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

        }
    </script>

    <script>

        function calculateVAT()
        {
            const totalPremiumDue = parseFloat(document.getElementById('net_premium_due').value.replace(/[^\d.]/g, '')) || 0;

            vatPercentage = 0.12;
            totalVAT = totalPremiumDue * vatPercentage ;

            document.getElementById('vat').value = totalVAT.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

        }
    </script>
    
    <!-- <script>

        function calculateLGT()
        {
            const totalPremiumDue = parseFloat(document.getElementById('net_premium_due').value.replace(/[^\d.]/g, '')) || 0;

            lgtPercentage = 0.002;
            totalLGT = totalPremiumDue * lgtPercentage ;

            document.getElementById('lgt').value = totalLGT.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

        }
    </script> -->


    <script>
    // Function to replace the select with an input when a value is chosen
        function replaceWithInput() {
            const select = document.getElementById('lgtSelect');
            const selectedValue = select.options[select.selectedIndex].value;

            // Call calculateLGT with the selected value
            calculateLGT(selectedValue);

            // Hide the select and display the input in the same position
            document.getElementById('lgtSelect').style.display = 'none';
            document.getElementById('lgtInput').style.display = 'block';
            calculateGrossPremium()
        }

        // Function to calculate LGT based on the selected value
        function calculateLGT(selectedValue) {
            console.log("calculateLGT called");
            console.log("Selected value:", selectedValue);

            const totalPremiumDue = parseFloat(document.getElementById('net_premium_due').value.replace(/[^\d.]/g, '')) || 0;

            console.log("Total Premium Due:", totalPremiumDue);

            // Calculate total LGT based on the selected percentage
            const totalLGT = totalPremiumDue * parseFloat(selectedValue);

            console.log("Total LGT:", totalLGT);

            // Display the calculated LGT in the input field
            document.getElementById('lgtInput').value = totalLGT.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Set focus on the select element on page load

    </script>


    <script>

        function calculateGrossPremium()
        {
            const totalPremiumDue = parseFloat(document.getElementById('net_premium_due').value.replace(/[^\d.]/g, '')) || 0;
            const totalDst = parseFloat(document.getElementById('dst').value.replace(/[^\d.]/g, '')) || 0;
            const totalVat = parseFloat(document.getElementById('vat').value.replace(/[^\d.]/g, '')) || 0;
            const totalLgt = parseFloat(document.getElementById('lgtInput').value.replace(/[^\d.]/g, '')) || 0;
            const totalRap = parseFloat(document.getElementById('rap').value.replace(/[^\d.]/g, '')) || 0;

            // const totalDst = parseFloat(document.getElementById('dst').split(',').join(''));



            totalGrossPremium = totalPremiumDue +  totalDst + totalVat + totalLgt + totalRap;

            document.getElementById('gross_premium').value = totalGrossPremium.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });


        }
    </script>






    <script>

        function totalNet()
        {
            const totalGrossPremium = parseFloat(document.getElementById('gross_premium').value.replace(/[^\d.]/g, '')) || 0;
            const totalDiscount = parseInt(document.getElementById('discount').value);

            totalvalueNet = totalGrossPremium - totalDiscount ;

         
            document.getElementById('net').value = totalvalueNet.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });



        }
    </script>


<script>

        let odtPremiumDue = document.getElementById('odt_premium_due');
        let odtRate = document.getElementById('odt_rate');
        let lgtSelect = document.getElementById('lgtSelect');
        let lgtInput = document.getElementById('lgtInput');

        let aogPremiumDue = document.getElementById('aog_premium_due');
        let netPremiumDue = document.getElementById('net_premium_due');
        let dstInput = document.getElementById('dst');
        let vatInput = document.getElementById('vat');
        let grossInput = document.getElementById('gross_premium');

        function resetLGTSelect() {
        document.getElementById('lgtSelect').style.display = 'block';
        document.getElementById('lgtInput').style.display = 'none';
        document.getElementById('lgtInput').value = "";
        document.getElementById('lgtSelect').selectedIndex = 0;
        // Add any additional logic here to reset the state of lgtSelect if needed
        }

        function clearAll(){

            odtPremiumDue.value = "";
            odtRate.value = "";
            aogPremiumDue.value = "";
            netPremiumDue.value = "";
            dstInput.value = "";
            vatInput.value = "";
            grossInput.value = "";
            resetLGTSelect();
        }

    </script>












@endsection
