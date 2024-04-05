@extends('template.admin.index')

@section('customer_is_active')
    {{ 'active' }}
@endsection

@section('title')
    {{ ucwords(str_replace('_', ' ', 'customer')) }}
@endsection

@section('create')
    {{ route("customer.create") }}
@endsection

@section('table_content')
    <thead>
        <tr>
            <th>{{ strtoupper(str_replace('_', ' ', 'id')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'name')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'company')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'phone')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'email')) }}</th>
            <th>{{ ucwords(str_replace('_', ' ', 'action')) }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->company }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('customer.edit', $customer->id) }}" type="button"
                                class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
