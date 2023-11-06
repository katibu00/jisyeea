@extends('admin.layout.app')

@section('pageTitle', 'Create a Form Questions')
@section('content')

<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Create Form Questions</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Create Form Questions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title mb-4">Create Form Questions</h4>
                        <!-- Form to create form questions -->
                        <form method="POST" action="{{ route('form-questions.store') }}">
                            @csrf
                            <input type="hidden" name="program_id" value="{{ $programId }}">

                            <!-- Question -->
                            <div class="mb-3">
                                <label for="question" class="form-label">Question</label>
                                <textarea class="form-control" id="question" name="question" rows="4" required></textarea>
                            </div>

                            <!-- Field Type -->
                            <div class="mb-3">
                                <label for="field_type" class="form-label">Field Type</label>
                                <select class="form-select" id="field_type" name="field_type" required>
                                    <option value="text">Text</option>
                                    <option value="number">Number</option>
                                    <option value="textarea">Textarea</option>
                                    <option value="select">Select</option>
                                </select>
                            </div>

                            <!-- Options (for select field) -->
                            <div class="mb-3" id="select-options" style="display: none;">
                                <label for="options" class="form-label">Options</label>
                                <input type="text" class="form-control" id="options" name="options">
                                <small class="form-text text-muted">Comma-separated options for select fields (e.g., Option 1, Option 2, Option 3)</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
</div>

@endsection

@section('js')
<script>
    // Show/hide options field based on field type selection
    document.getElementById('field_type').addEventListener('change', function () {
        const selectOptions = document.getElementById('select-options');
        if (this.value === 'select') {
            selectOptions.style.display = 'block';
        } else {
            selectOptions.style.display = 'none';
        }
    });
</script>
@endsection
