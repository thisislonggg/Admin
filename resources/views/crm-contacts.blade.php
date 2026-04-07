@extends('layouts.master')
@section('title')Metrica @endsection
@section('content')

@component('components.breadcrumb')
    @slot('li_1') Metrica @endslot
    @slot('li_2') CRM @endslot
    @slot('title') Contact Form @endslot
@endcomponent
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title mb-0">Contacts Details</h4>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('contacts.create') ?? '#' }}" class="btn btn-primary btn-sm px-4">
                            + Add New
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0"> 
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor WA</th>
                                <th>Perusahaan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($contacts as $contact)
                            <tr>
                                <td>
                                    @if($contact->avatar)
                                        <img src="{{ asset('storage/'.$contact->avatar) }}" alt="" class="thumb-sm rounded-circle me-2">
                                    @else
                                        <img src="{{ URL::asset('assets/images/users/user-vector.png') }}" alt="" class="thumb-sm rounded-circle me-2">
                                    @endif
                                    
                                    {{ $contact->name }}
                            
                                </td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $contact->company }}">
                                    {{ $contact->company ?? '-' }}
                                </td>                               
                                <td>
                                    @if($contact->status)
                                        <span class="badge bg-soft-primary">{{ $contact->status }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $contact->keterangan }}</td>

<td class="text-end text-nowrap">
    @php
        // 1. Bersihkan karakter selain angka (hapus spasi, strip, tanda +)
        $waNumber = preg_replace('/[^0-9]/', '', $contact->phone);
        // 2. Jika nomor dimulai dengan angka '0', ganti dengan '62'
        if (str_starts_with($waNumber, '0')) {
            $waNumber = '62' . substr($waNumber, 1);
        }
    @endphp
    
    <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="me-2" title="Chat WhatsApp">
        <i class="lab la-whatsapp text-success font-18 align-middle"></i>
    </a>

    <a href="{{ route('contacts.edit', $contact->id) ?? '#' }}" class="me-2" title="Edit Kontak">
        <i class="las la-pen text-secondary font-16 align-middle"></i>
    </a>
    
    <form action="{{ route('contacts.destroy', $contact->id) ?? '#' }}" method="POST" class="d-inline-block m-0 p-0" onsubmit="return confirm('Apakah kamu yakin ingin menghapus kontak ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-transparent border-0 p-0 m-0 align-middle" style="outline: none;" title="Hapus Kontak">
            <i class="las la-trash-alt text-secondary font-16"></i>
        </button>
    </form>
</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    Belum ada data kontak. Silakan tambahkan kontak baru.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card-footer bg-white border-top">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="text-muted mb-0">
                            Showing {{ $contacts->firstItem() ?? 0 }} to {{ $contacts->lastItem() ?? 0 }} of {{ $contacts->total() ?? 0 }} entries
                        </p>
                    </div>
                    <div class="col-auto">
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
@endsection