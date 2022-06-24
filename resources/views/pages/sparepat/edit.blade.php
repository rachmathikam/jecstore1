@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('type.index')}}">Type</a></li>
      <li class="breadcrumb-item active">Tambah Type</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Type</h5>
          <!-- Multi Columns Form -->
          <form class="row g-3" action="{{ route('type.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')
            <div class="col-md-12">
              <label for="inputName5" class="form-label">Type</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}" id="username" name="name" placeholder="Enter Username">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="inputName5" class="form-label">Seri</label>
                    <input type="text" class="form-control @error('seri') is-invalid @enderror" value="{{ $item->seri }}" id="username" name="seri" placeholder="Enter Username">
                          @error('seri')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                @can('menu-data-list')

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @endcan
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
