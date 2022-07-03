@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Layanan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h5 class="card-title">Layanan</h5>
                                <a href="{{ route('layanans.create') }}"><button type="button"
                                        class="btn btn-success">Tambah<i class="bi bi-plus"></i></button></a>
                                <table class="table datatable" style="width: 100%; white-space: nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Type Device</th>
                                            <th scope="col">Kerusakan</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Komentar</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($layanans as $layanan)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $layanan->user_name  }}</td>
                                                <td>{{ $layanan->email  }}</td>
                                                <td>{{ $layanan->brand  }}</td>
                                                <td>{{ $layanan->type  }}</td>
                                                <td>{{ $layanan->kerusakan }}</td>
                                                <td>{{ $layanan->deskripsi }}</td>
                                                <td>{{ $layanan->komentar  }}</td>


                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('layanans.destroy', $layanan->id) }}" method="POST">
                                                        <!-- <a href="{{ route('layanans.show', $layanan->id) }}"><button type="button" class="btn btn-primary"><i class="bi bi-info-circle"></i></button></a>  -->
                                                        <a href="{{ route('layanans.edit', $layanan->id) }}"><button
                                                                type="button" class="btn btn-warning"><i
                                                                    class="bi bi-pencil"></i></button></a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i></button>
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
