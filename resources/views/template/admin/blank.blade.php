@extends('template.admin.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">@yield('title')</h5>
        </div>
        <div class="card-body">
            @include("components.alert")
            @yield('form_content')
        </div>
    </div>
</div>
@endsection
