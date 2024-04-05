@extends('template.admin.edit')

@section('customer_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'customer')) }}
@endsection

@section('form_content')
    <form action="{{ route('customer.update', $data->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'name')) }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="company" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'company')) }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="company" name="company" value="{{ $data->company }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'phone')) }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">{{ ucwords(str_replace('_', ' ', 'email')) }}</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ ucwords(str_replace('_', ' ', 'submit')) }}</button>
    </form>
@endsection
