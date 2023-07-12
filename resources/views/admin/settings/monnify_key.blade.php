@extends('admin.layout.app')
@section('pageTitle','Monnify API Key')
@section('content')

<main id="main-container">
        
  <div class="content">
    <div class="row">
        <div class="col-md-12">

       <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monnify API Key</h5>
          </div>
          <div class="card-body">
            <form id="monnifyKeyForm">
              <div class="mb-3">
                <label for="publicKey" class="form-label">Public Key</label>
                <input type="text" class="form-control" id="publicKey" name="public_key" value="{{ $monnifyKeys->public_key ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="secretKey" class="form-label">Secret Key</label>
                <input type="text" class="form-control" id="secretKey" name="secret_key" value="{{ $monnifyKeys->secret_key ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="contractCode" class="form-label">Contract Code</label>
                <input type="text" class="form-control" id="contractCode" name="contract_code" value="{{ $monnifyKeys->contract_code ?? '' }}">
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
       </div>
       </div>
    </div>
  </div>
</main>

@endsection

@section('js')
<script>
  $(function() {
    // Handle form submission
    $('#monnifyKeyForm').submit(function(e) {
      e.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        url: '',
        method: 'POST',
        data: formData,
        success: function(response) {
          console.log(response.message);
          // Handle success response
        },
        error: function(xhr, status, error) {
          console.log(error);
          // Handle error response
        }
      });
    });
  });
</script>
@endsection
