@extends('layouts.master')
@section('title')Metrica @endsection
@section('content')

@component('components.breadcrumb')
    @slot('li_1') Metrica @endslot
    @slot('li_2') CRM @endslot
    @slot('title') Contacts @endslot
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
                                <th>Info / Perusahaan</th>
                                <th>Status</th>
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
                                    
                                    @if($contact->created_at >= now()->subDay())
                                    @endif
                                </td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->company ?? '-' }}</td>
                                <td>
                                    @if($contact->status)
                                        <span class="badge bg-soft-primary">{{ $contact->status }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
<td class="text-end">
    <a href="{{ route('contacts.edit', $contact->id) ?? '#' }}" class="me-2">
        <i class="las la-pen text-secondary font-16"></i>
    </a>
    
    <form action="{{ route('contacts.destroy', $contact->id) ?? '#' }}" method="POST" class="d-inline-block m-0 p-0" onsubmit="return confirm('Apakah kamu yakin ingin menghapus kontak ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-transparent border-0 p-0 m-0 align-top" style="outline: none;">
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