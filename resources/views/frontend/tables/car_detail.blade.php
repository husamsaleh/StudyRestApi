@extends('frontend.layout.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $car->carModel->name }} Details</h1>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Registration Number</th>
                <td>{{ $car->registrationNum }}</td>
            </tr>
            <tr>
                <th scope="row">Year of Manufacture</th>
                <td>{{ $car->yearOfManufacture }}</td>
            </tr>
            <tr>
                <th scope="row">Gearbox Type</th>
                <td>{{ optional($car->gearboxType)->type ?? 'gear box Type not assigned' }}</td>
            </tr>
            <tr>
                <th scope="row">Engines</th>
                <td>
                    @if(!empty($car->engine))
                    <ul>

                            <li>Capacity: {{ $car->engine->capacity ?? 'capacity not assigned' }}, Number of Cylinders: {{ $car-> engine->numberOfCylinders?? 'capacity not assigned'  }}</li>

                    </ul>
                    @else
                        No engines found for this car.
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">Company Address</th>
                <td>
                    {{ $car->companyAddress->country ?? 'country not assigned' }},
                    {{ $car->companyAddress->city ?? 'city not assigned' }},
                    {{ $car->companyAddress->street ?? 'street not assigned' }}
                </td>
            </tr>


            <tr>
                <th scope="row">Primary Image</th>
                <td>
                    @if($car->primary_image)
                        <div style="display: flex; align-items: center;">
                            <img src="{{ asset('storage/images/cars/' . $car->primary_image) }}" alt="Car Image" style="max-width: 100px;" onclick="toggleImageSize(this)">
                            <span style="margin-left: 5px; cursor: pointer;" onclick="toggleImageSize(this.previousElementSibling)">
                                <!-- You can replace the icon with an appropriate icon font or SVG -->
                                ⛶ <!-- Resize icon -->
                            </span>
                        </div>
                    @else
                        <p>No image available</p>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
    <button class="btn btn-primary" onclick="goBack()">Go Back</button>

</div>
@endsection



    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        function toggleImageSize(img) {
            if (img.style.maxWidth === "100%") {
                img.style.maxWidth = "100px"; // Set your desired initial width here
            } else {
                img.style.maxWidth = "100%"; // Set maximum width to 100% of the container
            }
        }
    </script>

