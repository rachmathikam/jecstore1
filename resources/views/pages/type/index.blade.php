@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Type Device</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Type Device</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <h5 class="card-title">Type Devices</h5>
                <a href="{{ route('type.create')}}"><button type="button" class="btn btn-success">Tambah<i class="bi bi-plus"></i></button></a>
                <table class="table datatable" style="width: 100%; white-space: nowrap">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Type</th>
                            <th scope="col">Seri</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($item as $type)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->seri }}</td>
                            <td>

                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('type.destroy', $type->id) }}" method="POST">
                            <!-- <a href="{{ route('type.show', $type->id) }}"><button type="button" class="btn btn-primary"><i class="bi bi-info-circle"></i></button></a>  -->
                            <a href="{{ route('type.edit', $type->id) }}"><button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button></a>

                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                  <!--  -->
                              </form>



                            </td>
                        </tr>
                        @endforeach
                    </tbody>
             </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection
