@extends('layouts.app')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Login</h3>

                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="email" class="form-control form-control-lg" required />
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </form>

                        <hr class="my-4">

                        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
    