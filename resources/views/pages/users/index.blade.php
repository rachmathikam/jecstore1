@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')

    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <h5 class="card-title">Datatables</h5>
                <button type="button" class="btn btn-success">Tambah<i class="bi bi-plus"></i></button>
                <table class="table datatable" style="width: 100%; white-space: nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $users)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>Admin</td>
                            <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $users->id) }}" method="POST">
                            <button type="button" class="btn btn-primary"><i class="bi bi-info-circle"></i></button> 
                            <a href="{{ route('users.edit', $users->id) }}"><button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button></a>
                          
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
