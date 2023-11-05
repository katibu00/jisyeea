@extends('admin.layout.app')

@section('pageTitle', 'Collections')

@section('content')

<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Collections</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Collections</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                
                    <div class="card-header d-md-flex">
                        <div class="col-md-4 col-12">
                            <h5 class="card-title mb-2">Collections</h5>
                        </div>
                        <div class="col-md-4 col-12 mb-2">
                            <form class="form-inline" action="{{ route('collections.filter') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <select class="form-select" name="status">
                                                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                                                <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>All</option>
                                            </select>
                                            <button class="btn btn-secondary" type="submit">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                        <div class="col-md-4 col-12 mb-2 text-end">
                            <a href="{{ route('collections.create') }}" class="btn btn-primary">+ Create New Collection</a>
                        </div>
                    </div>
                    
                    

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Max Users</th>
                                        <th>Status</th>
                                        <th>Number of Users</th>
                                        <th>Last Empowerment</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collections as $collection)
                                    <tr>
                                        <td>{{ $collection->title }}</td>
                                        <td>{{ $collection->description }}</td>
                                        <td>
                                            @if ($collection->max_users === null || $collection->max_users == 0)
                                                Unlimited
                                            @else
                                                {{ $collection->max_users }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($collection->status === 'active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif ($collection->status === 'archived')
                                                <span class="badge bd-danger">Archived</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $collection->status }}</span>
                                            @endif
                                        </td>
                                        
                                        <td>0</td>
                                        <td>{{ $collection->last_empowerment }}</td>
                                        <td>
                                            <div class="dropdown float-center">
                                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('collections.edit', $collection) }}">Edit</a>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="if (confirm('Are you sure you want to delete this collection?')) {
                                                            event.preventDefault(); 
                                                            document.getElementById('delete-form-{{ $collection->id }}').submit();
                                                        }">Delete</a>
                                                    <form id="delete-form-{{ $collection->id }}" action="{{ route('collections.destroy', $collection) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                                
                                                
                                            </div>
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


@endsection
