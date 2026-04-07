@extends('layouts.master')
@section('title')Metrica @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Metrica @endslot
@slot('li_2') CRM @endslot
@slot('title') Contacts @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title mb-0">Contacts Details</h4>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary btn-sm px-4">+ Add New</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0"> <div class="table-responsive">
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
                            <tr>
                                <td><img src="{{URL::asset('assets/images/users/user-10.jpg')}}" alt="" class="thumb-sm rounded-circle me-2">Donald Gardner<small class="badge bg-soft-pink ms-1">New</small></td>
                                <td>xyx@gmail.com</td>
                                <td>+123456789</td>
                                <td>Starbucks coffee</td>
                                <td>
                                    <span class="badge bg-soft-primary">test</span>
                                    <span class="badge bg-soft-primary">another</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="me-1"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="{{URL::asset('assets/images/users/user-9.jpg')}}" alt="" class="thumb-sm rounded-circle me-2">Matt Rosales</td>
                                <td>xyx@gmail.com</td>
                                <td>+123456789</td>
                                <td>112 - Mac Donald</td>
                                <td>
                                    <span class="badge bg-soft-primary">test</span>
                                    <span class="badge bg-soft-primary">another</span>
                                    <span class="badge bg-soft-primary">something</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="me-1"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="{{URL::asset('assets/images/users/user-8.jpg')}}" alt="" class="thumb-sm rounded-circle me-2">Michael Hill<small class="badge bg-soft-blue ms-1">New</small></td>
                                <td>xyx@gmail.com</td>
                                <td>+123456789</td>
                                <td>64 - Life Good</td>
                                <td>
                                    <span class="badge bg-soft-primary">test</span>
                                    <span class="badge bg-soft-primary">another</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="me-1"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="{{URL::asset('assets/images/users/user-7.jpg')}}" alt="" class="thumb-sm rounded-circle me-2">Nancy Flanary</td>
                                <td>xyx@gmail.com</td>
                                <td>+123456789</td>
                                <td>124 - Flipcart</td>
                                <td>
                                    <span class="badge bg-soft-primary">test</span>
                                    <span class="badge bg-soft-primary">another</span>
                                    <span class="badge bg-soft-primary">something</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="me-1"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="{{URL::asset('assets/images/users/user-6.jpg')}}" alt="" class="thumb-sm rounded-circle me-2">Dorothy Key</td>
                                <td>xyx@gmail.com</td>
                                <td>+123456789</td>
                                <td>33 - Adidas</td>
                                <td>
                                    <span class="badge bg-soft-primary">test</span>
                                    <span class="badge bg-soft-primary">something</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="me-1"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="{{URL::asset('assets/images/users/user-5.jpg')}}" alt="" class="thumb-sm rounded-circle me-2">Joseph Cross</td>
                                <td>xyx@gmail.com</td>
                                <td>+123456789</td>
                                <td>84 - Reebok</td>
                                <td>
                                    <span class="badge bg-soft-primary">test</span>
                                    <span class="badge bg-soft-primary">another</span>
                                    <span class="badge bg-soft-primary">something</span>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="me-1"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-top">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="text-muted mb-0">Showing 1 to 6 of 6 entries</p>
                    </div>
                    <div class="col-auto">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection