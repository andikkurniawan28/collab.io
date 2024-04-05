@extends('template.admin.edit')

@section('project_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'phase')) }}
@endsection

@section('form_content')
    <form action="{{ route('phase.update', $data->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'name')) }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="color" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'color')) }}</label>
            <div class="col-sm-10">
                <input type="color" class="form-control" id="color" name="color" value="{{ $data->color }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ ucwords(str_replace('_', ' ', 'submit')) }}</button>
    </form>
@endsection
