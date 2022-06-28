@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact</a></li>
                    <li class="breadcrumb-item active">Tambah Contact</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Contact</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Contact</label>
                                    <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                        value="{{ old('user_name') }}" id="name" name="user_name"
                                        placeholder="Enter Name" autofocus>
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" id="name" name="email" placeholder="Enter email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        value="{{ old('subject') }}" id="name" name="subject" placeholder="Enter Subject"
                                        autofocus>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                      <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="pesan"></textarea>
                                      <label for="inputName5" class="form-label">Pesan</label>
                                    </div>
                                  </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </section>

    </main><!-- End #main -->


@endsection
