@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('sparepat.index')}}">Sparepart</a></li>
      <li class="breadcrumb-item active">Tambah Sparepart</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Sparepart</h5>
          <!-- Multi Columns Form -->
          <form class="row g-3" action="{{ route('sparepat.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')
            <div class="col-md-12">
              <label for="inputName5" class="form-label">name</label>
              <input type="text" class="form-control @error('sparepat') is-invalid @enderror" value="{{ $item->sparepat }}" id="sparepat" name="sparepat" placeholder="Enter sparepat">
                    @error('sparepat')
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
