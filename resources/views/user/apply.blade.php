@extends('admin.layout.app')
@section('pageTitle', $program->title)
@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Applications</a></li>
                                <li class="breadcrumb-item active">{{ $program->title }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">  

                            <form method="POST" action="{{ route('application.submit') }}">
                                @csrf
                                @foreach ($program->questions as $question)
                                    <div class="form-group mb-3">
                                        <label for="question_{{ $question->id }}">{{ $question->question }}</label>
                                        @if ($question->field_type === 'text')
                                            <input type="text" class="form-control" name="question_{{ $question->id }}" id="question_{{ $question->id }}">
                                        @elseif ($question->field_type === 'number')
                                            <input type="number" class="form-control" name="question_{{ $question->id }}" id="question_{{ $question->id }}">
                                        @elseif ($question->field_type === 'textarea')
                                            <textarea name="question_{{ $question->id }}" class="form-control" id="question_{{ $question->id }}"></textarea>
                                        @elseif ($question->field_type === 'select')
                                            <select class="form-select" name="question_{{ $question->id }}" id="question_{{ $question->id }}">
                                                @foreach ($question->options as $option)
                                                    <option value="{{ $option }}">{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endforeach
                                <input type="hidden" value="{{ $program->id }}" name="program_id">
                                <button type="submit" class="btn btn-success">Submit Application</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @section('js')


    @endsection
