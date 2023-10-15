@extends('admin.layout.app')
@section('pageTitle', 'My Registration')
@section('content')

<div class="main-content">
    <div class="page-content">

        <!-- Start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Application List</h4>
                </div>
            </div>
        </div>
        <!-- End page title -->

        @if (count($applications) > 0)
        <div class="row">
            @foreach($applications as $application)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Application ID: {{ $application->application_number }}</h5>
                        <p class="card-text">Program Applied: {{ $application->programs }}</p>
                        <p class="card-text">Date Submitted: {{ $application->created_at->format('Y-m-d') }}</p>
                        <p class="card-text">Status: {{ $application->status }}</p>

                        <div class="mt-auto d-flex justify-content-end">
                            <a href="#" class="btn btn-primary me-2 btn-download" data-id="{{ $application->id }}">
                                <i class="fas fa-spinner fa-spin d-none"></i> Download Acknowledgment
                            </a>
                            <a href="{{ route('application.delete', $application->id) }}" class="btn btn-danger">Delete Application</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End row -->
        @else
        <div class="alert alert-info" role="alert">
            You have no applications.
        </div>
        @endif

    </div>
    <!-- End Page-content -->
</div>
@endsection

@section('js')

<script>
    $(document).ready(function() {
      $('.btn-download').on('click', function(e) {
        e.preventDefault();
        var applicationId = $(this).data('id');
        var $button = $(this);
        var $spinner = $button.find('.fa-spinner');
    
        // Show the loading spinner
        $spinner.removeClass('d-none');
    
        // Make an AJAX request to the server as a Blob
        $.ajax({
          type: 'GET',
          url: '/application/' + applicationId + '/download',
          xhrFields: {
            responseType: 'blob' // Handle the response as a Blob
          },
          success: function(response) {
            // Hide the loading spinner
            $spinner.addClass('d-none');
    
            // Create a temporary URL for the Blob response
            var url = window.URL.createObjectURL(response);
    
            var link = document.createElement('a');
            link.href = url;
            link.download = 'acknowledgment.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    
            // Clean up the temporary URL
            window.URL.revokeObjectURL(url);
          },
          error: function(xhr, status, error) {
            // Handle errors, if needed
            $spinner.addClass('d-none');
            alert('Error: ' + xhr.statusText);
          }
        });
      });
    });
</script>

@endsection
