@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">Roles</a></li>
      <li class="breadcrumb-item active">Tambah Roles</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

     

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Role</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3" action="{{ route('roles.store') }}" method="POST">
          @csrf
            <div class="col-md-12">
              <label for="inputName5" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Enter Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
                 
                <strong>
                      Permissions : <input type="checkbox" id="check-all"> <label for="check-all">Select All</label>
               </strong>

               @php($iteration = 1)
                @foreach ($permissions as $permission)
                
                <div class="col-md-2"><label for="permission{{$iteration}}" class="m-0 font-weight-bold">
                        <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="permission{{$iteration}}" name="permission[]">
                        <span>{{ $permission->name }}</span>
                    </label>
                </div>
            @php($iteration++)
              @endforeach

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
@section('javascript')
<script>

    $(document).ready(function() {
        $("input[name='permission[]']").change(function() {
            let permissionChecked = $("input[name='permission[]']:checked")
            if (permissionChecked.length === 0) {
                $('#error').text('*Permission Is Required!');
            } else {
                $('#error').text('');
            }
        });
        $('#check-all').click(function(event) {
            if (this.checked) {
                $(':checkbox').each(function() {
                    this.checked = true;
                    $('#error').text('');
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                    $('#error').text('*Permission Is Required!');
                });
            }
        });
    });
</script>
@endsection

@endsection