@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('users.index')}}">User</a></li>
      <li class="breadcrumb-item active">Tambah User</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">



      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Multi Columns Form</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3" action="{{ route('users.store') }}" method="POST">
          @csrf
            <div class="col-md-12">
              <label for="inputName5" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Enter Username">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="col-md-6">
                      <label for="inputEmail5" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter Email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="col-md-12">
              <label for="inputState" class="form-label">Role</label>
              <select id="inputState" class="form-select" name="roles">
                <option value="" selected>Pilih</option>
                @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
                  @endforeach
              </select>
              @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" name="image" >
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
