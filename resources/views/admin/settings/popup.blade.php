@extends('admin.layout.app')

@section('pageTitle', 'Regular Users')

@section('content')



    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">PopUp Notifications</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">PopUp Notifications</h5>
                        </div>

                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="table-responsive">


                                <form id="chargesForm" action="{{ route('pop_up_notification') }}" method="POST">
                                    @csrf
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="notificationSwitch"
                                            name="notificationSwitch" {{ @$popUp->switch === 'on' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="notificationSwitch">
                                            Enable Notification
                                        </label>
                                    </div>

                                    <div class="form-group" id="notificationBodyDiv"
                                        style="{{ @$popUp->switch === 'on' ? 'display: block;' : 'display: none;' }}">
                                        <label for="notificationBody">Notification Body</label>
                                        <textarea class="form-control" id="notificationBody" name="notificationBody" rows="5">{{ @$popUp->body }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('js')
    <script>
        const notificationSwitch = document.getElementById('notificationSwitch');
        const notificationBodyDiv = document.getElementById('notificationBodyDiv');

        // Initial state
        if (notificationSwitch.checked) {
            notificationBodyDiv.style.display = 'block';
        } else {
            notificationBodyDiv.style.display = 'none';
        }

        notificationSwitch.addEventListener('change', function() {
            if (this.checked) {
                notificationBodyDiv.style.display = 'block';
            } else {
                notificationBodyDiv.style.display = 'none';
            }
        });
    </script>
@endsection
