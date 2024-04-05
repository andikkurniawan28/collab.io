@extends('template.admin.create')

@section('project_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'project')) }}
@endsection

@section('form_content')
    <form action="{{ route("project.store") }}" method="POST">
        @csrf @method("POST")
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'title')) }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{ old("title") }}" required autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'description')) }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description">{{ old("description") }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="deadline" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'deadline')) }}</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old("deadline") }}" min="{{ date("Y-m-d") }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phase" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'phase')) }}</label>
            <div class="col-sm-10">
                <select class="form-control" name="phase_id" id="phase_id">
                    @foreach($setup["phase"] as $phase)
                        <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="customer" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'customer')) }}</label>
            <div class="col-sm-10">
                <select class="form-control" name="customer_id" id="customer_id">
                    @foreach($setup["customer"] as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} | {{ $customer->company }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="repository" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'repository')) }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="repository" id="repository">{{ old("repository") }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ ucwords(str_replace('_', ' ', 'submit')) }}</button>
    </form>
@endsection
