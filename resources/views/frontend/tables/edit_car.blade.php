@extends("frontend.layout.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Car</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('frontend.tables.cars.update', $car->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="registrationNum">Registration Number</label>
                                <input type="text" class="form-control" id="registrationNum" name="registrationNum" value="{{ $car->registrationNum }}" required>
                            </div>

                            <div class="form-group">
                                <label for="yearOfManufacture">Year of Manufacture</label>
                                <input type="number" class="form-control" id="yearOfManufacture" name="yearOfManufacture" min="1900" max="2100" step="1" value="{{ $car->yearOfManufacture }}" required>
                            </div>

                            <div class="form-group">
                                <label for="engine">Car Engine</label>
                                <select class="form-control" id="engine" name="engine" required>
                                    @foreach($engines as $engine)
                                        <option value="{{ $engine['id'] }}" {{ $car->engine_id == $engine['id'] ? 'selected' : '' }}>{{ $engine['formatted_engine'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="carModel">Car Model</label>
                                <select class="form-control" id="carModel" name="carModel" required>
                                    @foreach($carModels as $model)
                                        <option value="{{ $model->id }}" {{ $car->car_model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="companyAddress">Company Address</label>
                                <select class="form-control" id="companyAddress" name="companyAddress" required>
                                    @foreach($addresses as $address)
                                        <option value="{{ $address['id'] }}" {{ $car->company_address_id == $address['id'] ? 'selected' : '' }}>{{ $address['formatted_address'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
