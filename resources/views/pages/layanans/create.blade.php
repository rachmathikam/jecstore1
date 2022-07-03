@extends('../layouts.apps')
@section('title', 'layanan')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('layanan.index') }}">layanan</a></li>
                    <li class="breadcrumb-item active">Tambah layanan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah layanan</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="{{ route('layanans.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">layanan</label>
                                    <input type="text" class="form-control @error('layanan') is-invalid @enderror"
                                        value="{{ old('layanan') }}" id="name" name="layanan"
                                        placeholder="Enter Name" autofocus>
                                    @error('layanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Harga</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ old('harga') }}" id="name" name="harga" placeholder="Enter Harga"
                                        autofocus>
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Brand</label>
                                    <select id="inputState" class="form-select" name="brand_id">
                                        <option value="" selected>Pilih</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Type</label>
                                    <select id="inputState" class="form-select" name="type_id">
                                        <option value="" selected>Pilih</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Kerusakan</label>
                                    <input type="text" class="form-control @error('kerusakan') is-invalid @enderror"
                                        value="{{ old('kerusakan') }}" id="name" name="kerusakan" placeholder="Enter kerusakan"
                                        autofocus>
                                    @error('kerusakan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    @error('sparepart_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Gambar</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        value="{{ old('image') }}" id="image" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Stock</label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                        value="{{ old('stock') }}" id="name" name="stock" placeholder="Enter stock"
                                        autofocus>
                                    @error('stock')
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
