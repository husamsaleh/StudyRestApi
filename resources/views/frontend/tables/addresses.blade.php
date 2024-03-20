@extends("frontend/layout/app")
@section("content")


<div class="container mt-5">
  <h1>Company Addresses</h1>

  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('frontend.tables.addresses.create') }}" class="btn btn-primary">Create</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Address</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($addresses as $address)
        <tr>
          <td>{{ $address->country }}, {{ $address->city }}, {{ $address->street }}</td>
          <td>
            <div class="btn-group">
              <a href="{{ route('frontend.tables.addresses.edit', $address->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <a href="{{ route('frontend.tables.addresses.destroy', $address->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
              <a href="{{ route('addresses.cars', $address->id) }}" class="btn btn-sm btn-outline-secondary">Show Cars</a>

            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection