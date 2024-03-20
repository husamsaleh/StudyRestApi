@extends('frontend/layout.app')
@section('content')

    <div class="container-fluid bg-white d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center">
                        <a href="{{ route('addresses') }}" class="btn btn-primary mr-2 p-5" >Address</a>
                        <a href="{{ route('frontend.tables.cars') }}" class="btn btn-primary ml-2 p-5" >Cars</a>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
