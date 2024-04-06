@extends('template.admin.index')

@section('project_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'project')) }}
@endsection

@section('create')
    {{ route("project.create") }}
@endsection

@section('table_content')
    <thead>
        <tr>
            <th>{{ strtoupper(str_replace('_', ' ', 'id')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'title')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'deadline')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'customer')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'action')) }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>
                    <a href="{{ $project->repository }}" target="_blank">{{ $project->title }}</a>
                    <sub><span class="badge text-white" style="background-color: {{ $project->phase->color }}">{{ $project->phase->name }}</span></sub>
                </td>
                <td>{{ $project->deadline }}</td>
                <td>{{ $project->customer->name }}</td>
                <td>
                    <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <a href="{{ route('project.edit', $project->id) }}" type="button"
                                class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="{{ route("project.mockup.index", $project->id) }}" type="button"
                                class="btn btn-outline-info btn-sm" target="_blank"><i class="fas fa-images"></i> Mockup</a>

                            <a href="" type="button"
                                class="btn btn-outline-info btn-sm"><i class="fas fa-diagram-project"></i> Flowchart</a>

                            <a href="" type="button"
                                class="btn btn-outline-info btn-sm"><i class="fas fa-comments"></i> Discussion</a>

                            <a href="" type="button"
                                class="btn btn-outline-info btn-sm"><i class="fas fa-chalkboard-user"></i> Task</a>

                            <a href="" type="button"
                                class="btn btn-outline-info btn-sm"><i class="fas fa-bug"></i> Issue</a>

                            {{-- <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</button> --}}

                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
