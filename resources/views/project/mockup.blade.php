@extends('template.admin.blank')

@section('project_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ $data->title }} - {{ ucwords(str_replace('_', ' ', 'project_mockup')) }}
@endsection

@section('form_content')
    <div class="container d-flex justify-content-center mt-100">
        <div class="row">
            <div class="col-md-12">
                <h2>BBBOOTSTRAP FILE UPLOAD</h2>

                <div class="file-drop-area">
                    <span class="choose-file-button">Choose files</span>
                    <span class="file-message">or drag and drop files here</span>
                    <input class="file-input" type="file" multiple>
                </div>

            </div>

        </div>


    </div>
@endsection

@section('additional_style')
    <link src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </link>
    <style>
        h2 {
            margin: 50px 0;
        }

        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            width: 450px;
            max-width: 100%;
            padding: 25px;
            border: 1px dashed rgba(255, 255, 255, 0.4);
            border-radius: 3px;
            transition: 0.2s;

        }

        .choose-file-button {
            flex-shrink: 0;
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .file-message {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;

        }

        .mt-100 {
            margin-top: 100px;
        }
    </style>
@endsection

@section('additional_script')
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> --}}
    <script>
        $(document).on('change', '.file-input', function() {


            var filesCount = $(this)[0].files.length;

            var textbox = $(this).prev();

            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
                textbox.text(fileName);
            } else {
                textbox.text(filesCount + ' files selected');
            }
        });
    </script>
@endsection
