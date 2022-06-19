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
          <h5 class="card-title">Edit User</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3" action="{{ route('users.update',$data->id) }}" method="POST">
          @csrf
          @method('PUT')
            <div class="col-md-12">
              <label for="inputName5" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" id="username" name="name" placeholder="Enter Username">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="col-md-6">
                      <label for="inputEmail5" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" id="email" name="email" placeholder="Enter Email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword4" name="password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">Confirm Password</label>
              <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="inputPassword4" name="password_confirmation">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="col-md-12">
              <label for="role" class="form-label">Role</label>
              <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
              <option value="">-- Pilih Role --</option>
                  @foreach ($roles as $role)          
                      <option value="{{ $role->id }}" @selected($role->id == $userRole->id)>{{ $role->name }}</option>
                  @endforeach
              </select>
              </select>
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