@extends('../layouts.apps')
@section('title', 'Dashboard')
@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h5 class="card-title">Contact</h5>
                                <a href="{{ route('contact.create') }}"><button type="button"
                                        class="btn btn-success">Tambah<i class="bi bi-plus"></i></button></a>
                                <table class="table datatable" style="width: 100%; white-space: nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">pesan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $contact->user_name  }}</td>
                                                <td>{{ $contact->email  }}</td>
                                                <td>{{ $contact->subject  }}</td>
                                                <td>{{ $contact->pesan  }}</td>

                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                                                        <!-- <a href="{{ route('contact.show', $contact->id) }}"><button type="button" class="btn btn-primary"><i class="bi bi-info-circle"></i></button></a>  -->
                                                        <a href="{{ route('contact.edit', $contact->id) }}"><button
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
