@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<a href="{{ route('users.index')}}"><button type="button" class="btn btn-success" style="margin-bottom:10px"><i class="bi bi-arrow-left">Kembali</i></button></a>

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
          <h2>{{ $data->name }}</h2>
          @foreach($data->getRoleNames() as $role)
          <h3>{{$role}}</h3>
          @endforeach
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title">Profile</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{ $data->name }}</div>
                </div>
              <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $data->email }}</div>
                </div>
                @foreach($data->getRoleNames() as $role)
                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Role</div>
                    <div class="col-lg-9 col-md-8">{{ $role}}</div>
                </div>

                @endforeach
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form class="row g-3" action="{{ route('users.update',$data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile">
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" id="name" name="name" placeholder="Enter name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" id="email" name="email" placeholder="Enter Email">
                  </div>
                </div>
                @if(auth()->user()->can('manu-data-list'))
                <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Role</label>
                    <div class="col-md-8 col-lg-9">
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected($role->id == $userRole->id)>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            </select>
                    </div>
                  </div>
                  @endif
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>
            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form>

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection
