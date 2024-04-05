@extends('template.admin.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">@yield("title")</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include("components.alert")
                <a href="@yield('create')" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus"></i> Create</a>
                <br><br>
                <table class="table table-hovered table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    @yield("table_content")
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
