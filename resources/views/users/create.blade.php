@extends('partials.master')

@section('content')

  
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4>Ajouter un utilisateur</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un utilisateur</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulaire d'ajout d'utilisateur</h4>
                       
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{ route('users.store') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Nom et Prénom sur la même ligne -->
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="firstname" class="form-label">Prénom <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="firstname" name="user[0][firstname]" placeholder="Entrez le prénom" required>
                                                <div class="invalid-feedback">Veuillez entrer un prénom.</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="lastname" class="form-label">Nom <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="lastname" name="user[0][lastname]" placeholder="Entrez le nom" required>
                                                <div class="invalid-feedback">Veuillez entrer un nom.</div>
                                            </div>
                                        </div>

                                        <!-- Email et Rôle sur la même ligne -->
                                        <div class="row mb-3">
                                             
                                            <div class="col-lg-6">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="user[0][email]" placeholder="Entrez l'email" required>
                                                <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="role" class="form-label">Rôle</label>
                                                <select class="form-select" name="user[0][role]">
                                                    <option value="" disabled selected>-- Sélectionnez un rôle --</option>
                                                    <option value="admin" {{ old('user.0.role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="super_admin" {{ old('user.0.role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                                </select>
                                            </div>
                                           
                                        </div>

                                        <!-- Actif sur une ligne seule -->
                                        <div class="row mb-3">
                                          
                                            <div class="col-lg-6">
                                                <label for="is_active" class="form-label">Actif</label>
                                                <select class="form-select" name="user[0][is_active]">
                                                    <option value="1" {{ old('user.0.is_active') == '1' ? 'selected' : '' }}>Oui</option>
                                                    <option value="0" {{ old('user.0.is_active') == '0' ? 'selected' : '' }}>Non</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 text-end">
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </div>

                                        @if (session('success'))
                                            <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
