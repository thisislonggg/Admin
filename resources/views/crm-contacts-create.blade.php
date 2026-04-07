@extends('layouts.master')
@section('title')Add New Contact @endsection
@section('content')

@component('components.breadcrumb')
    @slot('li_1') Metrica @endslot
    @slot('li_2') CRM @endslot
    @slot('title') Add Contact @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambahkan Kontak Baru</h4>
                <p class="text-muted mb-0">Isi formulir di bawah ini untuk menambahkan kontak ke dalam sistem CRM.</p>
            </div><div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email">Alamat Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="phone">Nomor WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+628123456789" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="company">Perusahaan</label>
                            <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" placeholder="Nama Perusahaan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="status">Status / Tag</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Pilih Status...</option>
                                <option value="Proses Meeting" {{ old('status', $contact->status) == 'Proses Meeting' ? 'selected' : '' }}>VIP</option>
                                <option value="Kirim Penawaran" {{ old('status', $contact->status) == 'Kirim Penawaran' ? 'selected' : '' }}>Reguler</option>
                                <option value="Deal" {{ old('status', $contact->status) == 'Deal' ? 'selected' : '' }}>Lead</option>
                                <option value="Batal" {{ old('status', $contact->status) == 'Batal' ? 'selected' : '' }}>Lead</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterngan') }}" placeholder="Keterangan">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="avatar">Foto Avatar (Opsional)</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                        <small class="text-muted">Format yang diizinkan: JPG, PNG, JPEG. Maksimal 2MB.</small>
                    </div>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('contacts.index') }}" class="btn btn-outline-danger">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan Kontak</button>
</div>
                </form>
            </div></div></div></div>@endsection