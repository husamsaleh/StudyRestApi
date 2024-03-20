@extends('frontend/layout/app')

@section('content')
    <div class="container">

        <form action="{{ route('frontend.tables.addresses.update', $address->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ $address->country }}" required>
                @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ $address->city }}" required>
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" id="street" value="{{ $address->street }}" required>
                @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Address</button>
        </form>
    </div>
@endsection
