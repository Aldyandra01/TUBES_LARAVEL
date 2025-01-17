@extends('layouts.main_admin')

@section('title', 'Edit Gedung')

@push('styles')
    <link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index_admin')}}"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.form_gedung') }}"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Form Data Nav -->

        <li class="nav-item">
            <a class="nav-link active" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="edits-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.edit_gedung', ['id' => $building->id]) }}" class="active"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Edit Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#hapuss-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Hapus Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="hapuss-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    
                        <a href="{{ route('admin.hapus_gedung', ['id' => $building->id]) }}">
                            <i class="bi bi-circle"></i><span>Data Gedung</span>
                        </a>
                    
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Data Ruang</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Delete Data Nav -->

        <li class="nav-item"><a class="nav-link collapsed" href="#"><i class="bi bi-layout-text-window-reverse"></i><span>Riwayat</span></a></li>
    </ul>
</aside><!-- End Sidebar -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Gedung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index_mhs') }}">Beranda</a></li>
                <li class="breadcrumb-item">Edit Data</li>
                <li class="breadcrumb-item active">Data Gedung</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
        <form action="{{ route('admin.update_gedung', $building->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_building" class="form-label">Nama Gedung</label>
            <select class="form-control" id="name_building" name="name_building" required>
                        @foreach($allBuildings as $bld)
                            <option value="{{ $bld->name_building }}" {{ $bld->name_building == $building->name_building ? 'selected' : '' }}>
                                {{ $bld->name_building }}
                            </option>
                        @endforeach
                    </select>
        </div>

        <div class="mb-3">
            <label for="floor" class="form-label">Lantai</label>
            <input type="number" class="form-control" id="floor" name="floor" value="{{ $building->floor }}" required>
        </div>

        <div class="mb-3">
            <label for="mapping" class="form-label">Mapping URL</label>
            <input type="url" class="form-control" id="mapping" name="mapping" value="{{ $building->mapping }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <small>Upload file gambar (opsional).</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
        </div>
    </section>
</main><!-- End #main -->
@endsection
