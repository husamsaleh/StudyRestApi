@extends("frontend.layout.app")

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Car') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.tables.cars.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="registrationNum" class="col-md-4 col-form-label text-md-right">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="registrationNum" type="text" class="form-control @error('registrationNum') is-invalid @enderror" name="registrationNum" value="{{ old('registrationNum') }}" required autocomplete="registrationNum">

                                @error('registrationNum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="yearOfManufacture" class="col-md-4 col-form-label text-md-right">{{ __('Year of Manufacture') }}</label>

                            <div class="col-md-6">
                                <input id="yearOfManufacture" type="number" class="form-control @error('yearOfManufacture') is-invalid @enderror" name="yearOfManufacture" value="{{ old('yearOfManufacture') }}" required autocomplete="yearOfManufacture">

                                @error('yearOfManufacture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="engine" class="col-md-4 col-form-label text-md-right">{{ __('Engine') }}</label>

                            <div class="col-md-6">
                            <select id="engine" class="form-control @error('engine') is-invalid @enderror" name="engine" required>
    <option value="">Select Engine</option>
    @foreach($engines as $engine)
        <option value="{{ $engine['id'] }}">{{ $engine['formatted_engine'] }}</option>
    @endforeach
</select>

                                @error('engine')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="carModel" class="col-md-4 col-form-label text-md-right">{{ __('Car Model') }}</label>

                            <div class="col-md-6">
                                <select id="carModel" class="form-control @error('carModel') is-invalid @enderror" name="carModel" required>
                                    <option value="">Select Car Model</option>
                                    @foreach($carModels as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>

                                @error('carModel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companyAddress" class="col-md-4 col-form-label text-md-right">{{ __('Company Address') }}</label>

                            <div class="col-md-6">
                                <select id="companyAddress" class="form-control @error('companyAddress') is-invalid @enderror" name="companyAddress" required>
                                    <option value="">Select Company Address</option>
                                    @foreach($addresses as $address)
                                        <option value="{{ $address['id'] }}">{{ $address['formatted_address'] }}</option>
                                    @endforeach
                                </select>

                                @error('companyAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="primary_image">Car Main Image</label>
                            <input type="file" name="primary_image" id="primary_image" class="form-control-file" required accept="image/*">
                            <img id="preview_image" src="#" alt="Preview" style="display: none; width: 100px; height: auto;">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                                <a href="{{ url('/cars') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    <script type="text/javascript">
        $(document).ready(function(){
            $('#primary_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_image').attr('src', e.target.result);
                    $('#preview_image').css('display', 'block');
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>


