@extends('template.admin.index')

@section('project_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'phase')) }}
@endsection

@section('create')
    {{ route("phase.create") }}
@endsection

@section('table_content')
    <thead>
        <tr>
            <th>{{ strtoupper(str_replace('_', ' ', 'id')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'name')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'action')) }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $phase)
            <tr>
                <td>{{ $phase->id }}</td>
                <td>
                    <span class="badge text-white"
                        style="
                                    background-color: {{ $phase->color }};
                                    font-size: 15px;">
                        {{ $phase->name }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('phase.destroy', $phase->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('phase.edit', $phase->id) }}" type="button"
                                class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
