@extends('admin.layout.app')
@section('pageTitle', 'Account Details')
@section('content')

    <div class="main-content">
        <div class="page-content">

            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Account Details</h4>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" required>
                                </div>

                                <div class="mb-3">
                                    <label for="account_name" class="form-label">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="bank" class="form-label">Bank</label>
                                    <select class="form-select" id="bank" name="bank" required>
                                        <option value=""></option>
                                        <option value="Access Bank Plc">Access Bank Plc</option>
                                        <option value="Citibank Nigeria Limited">Citibank Nigeria Limited</option>
                                        <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                                        <option value="Fidelity Bank Plc">Fidelity Bank Plc</option>
                                        <option value="First Bank of Nigeria Limited">First Bank of Nigeria Limited</option>
                                        <option value="First City Monument Bank Limited">First City Monument Bank Limited</option>
                                        <option value="Globus Bank Limited">Globus Bank Limited</option>
                                        <option value="Guaranty Trust Holding Company Plc">Guaranty Trust Holding Company Plc</option>
                                        <option value="Heritage Bank Plc">Heritage Bank Plc</option>
                                        <option value="Jaiz Bank Plc">Jaiz Bank Plc</option>
                                        <option value="Keystone Bank Limited">Keystone Bank Limited</option>
                                        <option value="LOTUS BANK">LOTUS BANK</option>
                                        <option value="Optimus Bank Limited">Optimus Bank Limited</option>
                                        <option value="Parallex Bank Limited">Parallex Bank Limited</option>
                                        <option value="Polaris Bank Limited">Polaris Bank Limited</option>
                                        <option value="PremiumTrust Bank Limited">PremiumTrust Bank Limited</option>
                                        <option value="Providus Bank Limited">Providus Bank Limited</option>
                                        <option value="Stanbic IBTC Bank Plc">Stanbic IBTC Bank Plc</option>
                                        <option value="Standard Chartered">Standard Chartered</option>
                                        <option value="Sterling Bank Plc">Sterling Bank Plc</option>
                                        <option value="SunTrust Bank Nigeria Limited">SunTrust Bank Nigeria Limited</option>
                                        <option value="TAJBank Limited">TAJBank Limited</option>
                                        <option value="Titan Trust Bank">Titan Trust Bank</option>
                                        <option value="Union Bank of Nigeria Plc">Union Bank of Nigeria Plc</option>
                                        <option value="United Bank for Africa Plc">United Bank for Africa Plc</option>
                                        <option value="Unity Bank Plc">Unity Bank Plc</option>
                                        <option value="Wema Bank Plc">Wema Bank Plc</option>
                                        <option value="Zenith Bank Plc">Zenith Bank Plc</option>
                                    </select>
                                    
                                </div>

                                  <!-- Add BVN Input Field -->
                                  <div class="mb-3">
                                    <label for="bvn" class="form-label">BVN</label>
                                    <input type="text" class="form-control" id="bvn" name="bvn" required>
                                </div>
                                <!-- Display NIN from pre-registration if available -->
                                <div class="mb-3">
                                    <label for="nin" class="form-label">NIN</label>
                                    @if($user->preRegistration && $user->preRegistration->nin)
                                        <input type="text" class="form-control" id="nin" name="nin" value="{{ $user->preRegistration->nin }}" readonly>
                                    @else
                                        <input type="text" class="form-control" id="nin" name="nin" value="{{ old('nin') }}" required>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End Page-content -->
        </div>
    @endsection
