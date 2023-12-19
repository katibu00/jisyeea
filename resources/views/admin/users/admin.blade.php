@extends('admin.layout.app')

@section('pageTitle', 'Administrators')

@section('content')



    <div class="main-content">

        <div class="page-content">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Administrators</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Administrators</h5>
                            <button type="button" class="btn btn-primary" onclick="openAddAdminModal()">Create New Administrator</button>
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


                                <table style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr style="background-color: #f2f2f2;">
                                            <th style="padding: 10px; border: 1px solid #ddd;">#</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Phone</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                                            <th style="padding: 10px; border: 1px solid #ddd;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $key+1 }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->name }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->phone }}</td>
                                                <td style="padding: 10px; border: 1px solid #ddd;">{{ $user->email }}</td>
                                               
                                                <td style="padding: 10px; border: 1px solid #ddd;">
                                                    <form action="{{ route('admins.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</button>
                                                    </form>
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


            <div class="modal" id="addAdminModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create New Administrator</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="adminForm" method="POST" action="{{ route('users.admin.index') }}">
                            @csrf
                        <div class="modal-body">
                            <!-- Add a form for creating a new administrator -->
                            
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            

    </div>
@endsection

@section('js')
<script>
    // Function to open the "Create New Administrator" modal
    function openAddAdminModal() {
        $('#addAdminModal').modal('show');
    }
</script>

@endsection
