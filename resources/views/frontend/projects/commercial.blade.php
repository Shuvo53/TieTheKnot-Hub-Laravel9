{{-- @extends('layouts.customer')

@section('title')
    BLISS Commercial Projects
@endsection

@section('content')

<div class="py-5"></div>
<div class="container">
    <!-- Section: Commercial Projects -->
    <section class="mb-4">

        <div>
            <img src="{{ asset('images/background.jpg') }}" alt="Background Image">
        </div>

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Commercial Projects</h2>

        <!-- Project cards -->
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    <!-- Section: Commercial Projects -->
</div>
<div class="py-5"></div>

@endsection --}}
<h4>Commercial</h4>
