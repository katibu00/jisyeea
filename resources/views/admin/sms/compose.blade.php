@extends('admin.layout.app')

@section('pageTitle', 'Compose SMS')

@section('content')

<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Compose SMS</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Compose SMS</li>
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
                        <h5 class="card-title">Send SMS to Collection: <strong>{{ $collection->title }}</strong></h5>
                    </div>

                    <form action="{{ route('sms.send') }}" method="post" class="p-4">
                        @csrf

                        <div class="mb-3">
                            <label for="message" class="form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="4" oninput="countCharacters()" required></textarea>
                            <small id="charCount" class="form-text text-muted">Characters: 0 | Pages: 0</small>
                        </div>
                        <input type="hidden" value="{{ $collection->id }}" name="collectionId"/>

                        <button type="submit" class="btn btn-primary">Send SMS</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function countCharacters() {
            const messageInput = document.getElementById('message');
            const charCountElement = document.getElementById('charCount');

            const message = messageInput.value;
            const charCount = message.length;
            const pageCount = Math.ceil(charCount / 160);

            charCountElement.innerText = `Characters: ${charCount} | Pages: ${pageCount}`;
        }
    </script>

@endsection
