@if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
@elseif($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@elseif($message = Session::get('fail'))
    <div class="alert alert-dark" role="alert">
        {{ $message }}
    </div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
    <p>Error :</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
@endif
