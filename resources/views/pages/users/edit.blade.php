@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Layouts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-8" style="display:block; margin-left:auto; margin-right:auto;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Form</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3" action="{{ route('users.update', $data->id) }}" method="POST">
                        @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputNanme4" value="{{ $data->name }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail4" value="{{  $data->email }}" name="email">

                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword4" name="password">

                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="inputPassword4" name="password_confirmation">

                                @error('confirm_password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
