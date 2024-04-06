@extends('template.admin.blank')

@section('project_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ $data->title }} - {{ ucwords(str_replace('_', ' ', 'project_mockup')) }}
@endsection

@section('form_content')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <div class="row text-center text-lg-start">
        <div class="col-lg-12 col-md-12 col-12">
            <form action="{{ route('project.mockup.upload') }}" method="post" enctype="multipart/form-data" id="image-upload"
                class="dropzone">
                @csrf
                <input type="hidden" name="project_id" value="{{ $data->id }}">
            </form>
            <br>
        </div>
        <script type="text/javascript">
            var dropzone = new Dropzone('#image-upload', {
                thumbnailWidth: 200,
                maxFilesize: 10,
                /* dalam mb */
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
            });
        </script>
    </div>
    <div class="row text-center text-lg-start">
        <style>
            .image-area {
                position: relative;
                width: 100%;
                background: #333;
            }

            .image-area img {
                max-width: 100%;
                height: auto;
            }

            .remove-image {
                display: none;
                position: absolute;
                top: -10px;
                right: -10px;
                border-radius: 10em;
                padding: 2px 6px 3px;
                text-decoration: none;
                font: 700 21px/20px sans-serif;
                background: #555;
                border: 3px solid #fff;
                color: #FFF;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
                -webkit-transition: background 0.5s;
                transition: background 0.5s;
            }

            .remove-image:hover {
                background: #E54E4E;
                padding: 3px 7px 5px;
                top: -11px;
                right: -11px;
            }

            .remove-image:active {
                background: #E54E4E;
                top: -10px;
                right: -11px;
            }
        </style>
        @foreach ($data->mockup as $mockup)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="image-area">
                    <a href="{{ asset($mockup->path) }}" class="d-block mb-4 h-100" target="_blank">
                        <img class="img-fluid img-thumbnail" src="{{ asset($mockup->path) }}" alt="">
                    </a>
                    <form action="{{ route("project.mockup.delete", $mockup->id) }}" method="POST">
                        @csrf @method("DELETE")
                        <input type="hidden" name="path" value="{{ $mockup->path }}">
                        <button type="submit" class="remove-image" href="#" style="display: inline;">&#215;</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('additional_style')
@endsection

@section('additional_script')
@endsection
