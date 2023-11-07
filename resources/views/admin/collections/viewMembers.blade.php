@extends('admin.layout.app')

@section('pageTitle', 'Collection Details')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Collection Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">Collections</a></li>
                            <li class="breadcrumb-item active">Collection Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Collection Details</h5>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <h5 class="mb-4">Members in the Collection</h5>
                            
                            <ul>
                                @foreach ($users as $user)
                                    <li>{{ $user->name }} ({{ $user->email }})</li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
