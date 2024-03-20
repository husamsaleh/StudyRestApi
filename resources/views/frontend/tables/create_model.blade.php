@extends("frontend.layout.app")

@section('content')
    <form method="POST" action="{{ route('frontend.tables.create_model.store') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autofocus>

                @error('model')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Create') }}
        </button>
    </form>
@endsection
