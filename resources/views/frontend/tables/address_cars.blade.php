@extends('frontend/layout/app')

@section('content')
<div class="container mt-5">
    <h1>Cars Assigned to {{ $address->country }}, {{ $address->city }}, {{ $address->street }}</h1>

    @if ($cars ?? null)
        @if ($cars->isEmpty())
            <p>No cars assigned to this address.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Registration Number</th>
                        <th>Year of Manufacture</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->registrationNum }}</td>
                            <td>{{ $car->yearOfManufacture }}</td>
                            <td>
                                <a href="{{ route('frontend.tables.cars.show', ['car' => $car->id]) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @else
        <p>No cars assigned to this address.</p>
    @endif
</div>
@endsection
