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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>LGA</th>
                                        <th>Study Area</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->preRegistration->lga_origin ?? 'N/A' }}</td>
                                <td>{{ $user->preRegistration->highest_education ?? 'N/A' }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="d-flex">
                                    <form id="removeUserForm_{{ $user->id }}" action="{{ route('collections.removeUser', ['collection' => $collection, 'user' => $user]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmRemove('{{ $user->name }}', '{{ $user->id }}')">X</button>
                                    </form>
                                    <a href="{{ route('collections.memberDetails', ['collection' => $collection, 'user' => $user]) }}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                </td>
                            </tr>
                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function confirmRemove(userName, userId) {
        if (confirm(`Are you sure you want to remove ${userName} from the collection?`)) {
            document.getElementById(`removeUserForm_${userId}`).submit();
        }
    }
</script>
@endsection
