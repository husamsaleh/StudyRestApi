@extends("frontend.layout.app")

@section("content")
<div class="container mt-5">
  <h1>Company Cars</h1>

  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('frontend.tables.cars.create') }}" class="btn btn-primary">Create Car</a>
  </div>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('frontend.tables.create_model') }}" class="btn btn-primary">Create Model</a>
    </div>

  <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">car Brand</th>
            <th scope="col">Registration Number</th>
            <th scope="col">Year of Manufacture</th>
            <th scope="col">Car Model</th>
            <th scope="col">Company Address</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
            <td>{{ $car->name }}</td>
                <td>{{ $car->registrationNum }}</td>
                <td>{{ $car->yearOfManufacture }}</td>
                <td>{{ $car->carModel ? $car->carModel->name : 'No model available' }}</td>
                <td>
                    @if ($car->companyAddress)
                        {{ $car->companyAddress->country }}, {{ $car->companyAddress->city }}, {{ $car->companyAddress->street }}
                    @else
                        No company address available
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('frontend.tables.cars.show', $car->id) }}" class="btn btn-sm btn-outline-primary">All Details</a>
                        <a href="{{ route('frontend.tables.cars.edit', $car->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                        <form action="{{ route('frontend.tables.cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
