@extends('layouts.master')
@section('title')Edit Contact @endsection
@section('content')

@component('components.breadcrumb')
    @slot('li_1') Metrica @endslot
    @slot('li_2') CRM @endslot
    @slot('title') Edit Contact @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Kontak</h4>
                <p class="text-muted mb-0">Perbarui informasi kontak untuk <b>{{ $contact->name }}</b>.</p>
            </div>
            
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email">Alamat Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="phone">Nomor WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="company">Perusahaan</label>
                            <input type="text" class="form-control" id="company" name="company" value="{{ old('company', $contact->company) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Pilih Status...</option>
                                <option value="Proses Meeting" {{ old('status', $contact->status) == 'Proses Meeting' ? 'selected' : '' }}>Proses Meeting</option>
                                <option value="Kirim Penawaran" {{ old('status', $contact->status) == 'Kirim Penawaran' ? 'selected' : '' }}>Kirim Penawaran</option>
                                <option value="Deal" {{ old('status', $contact->status) == 'Deal' ? 'selected' : '' }}>Deal</option>
                                <option value="Batal" {{ old('status', $contact->status) == 'Batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $contact->keterangan) }}" placeholder="Keterangan">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="avatar">Foto Avatar Baru (Opsional)</label>
                        
                        @if($contact->avatar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$contact->avatar) }}" alt="Current Avatar" class="rounded-circle img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                <span class="text-muted ms-2 fs-12">Foto saat ini</span>
                            </div>
                        @endif
                        
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto. Maks 2MB.</small>
                    </div>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('contacts.index') }}" class="btn btn-outline-danger">Batal</a>
    <button type="submit" class="btn btn-primary">Update Kontak</button>
</div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection