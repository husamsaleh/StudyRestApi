@extends('frontend/layout/app')

@section('content')
    <div class="container mt-5">


<form action="{{ route('frontend.tables.addresses.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" class="form-control" name="country" id="country" required>
    </div>

    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" name="city" id="city" required>
    </div>

    <div class="form-group">
        <label for="street">Street:</label>
        <input type="text" class="form-control" name="street" id="street" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Address</button>

</form>
    </div>
@endsection
