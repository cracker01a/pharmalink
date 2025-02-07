@extends('partials.master')

@section('content')


<div class="content-body">
   
        <div class="container-fluid">
            <div class="page-titles d-flex justify-content-between align-items-center">
                <div>
                    <h4>Bootstrap</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                    </ol>
                </div>
                <div>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter des utilisateurs</a>
                </div>
            </div>
        </div>

        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Payments Queue</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>PRENOM</strong></th>
                                        <th><strong>NOM</strong></th>
                                        <th><strong>EMAIL</strong></th>
                                        <th><strong>STATUT</strong></th>
                                        <th><strong>PRICE</strong></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                    <td><strong>{{ $user->id }}</strong></td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }} </td>
                                        <td>{{ $user->email }}</td>
                                        <td><span class="badge light badge-success">{{ $user->role }}</span></td>
                                        <td><span class="badge light badge-success">{{ $user->is_active ? 'Oui' : 'Non' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
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
    </div>
</div>

@endsection