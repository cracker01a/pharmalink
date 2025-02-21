@php use Illuminate\Support\Facades\Auth; @endphp
@extends('partials.master')

@section('content')

    @php

        $user = Auth::user();

        $doctor = $user->doctor; // Récupère les infos du doctor lié à l'utilisateur

        // Récupère les infos du doctor lié à l'utilisateur

    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Profile</h4>
                <ol class="breadcrumb">
                    <!-- <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li> -->
                    <li class="breadcrumb-item active"><a href="javascript:void(0)"> Bienvenue sur votre Profile</a>
                    </li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="images/profile/small/male.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ $user->firstname }} {{ $user->lastname }}</h4>
                                        <p>{{ $doctor ? $doctor->specialite : 'admin' }}</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ $user->email }}</h4>
                                        <p>Email</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="profile-statistics mb-5">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="m-b-0">150</h3><span>Ordonnances</span>
                                        </div>
                                        <div class="col">
                                            <h3 class="m-b-0">140</h3><span>Patients</span>
                                        </div>

                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('Ordonnance.index')}}" class="btn btn-primary mb-1 me-1">Ordonnances</a>
                                        <a href="{{ route('patients.index')}}" class="btn btn-primary mb-1">Patients</a>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="sendMessageModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Send Message</h5>
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="comment-form">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="text-black font-w600">Name <span
                                                                        class="required">*</span></label>
                                                                <input type="text" class="form-control" value="Author"
                                                                       name="Author" placeholder="Author">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="text-black font-w600">Email <span
                                                                        class="required">*</span></label>
                                                                <input type="text" class="form-control" value="Email"
                                                                       placeholder="Email" name="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="text-black font-w600">Comment</label>
                                                                <textarea rows="8" class="form-control" name="comment"
                                                                          placeholder="Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <input type="submit" value="Post Comment"
                                                                       class="submit btn btn-primary" name="submit">
                                                            </div>
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
                </div>
                <div class="col-xl-8">
                    <div class="card h-auto">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <!-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Posts</a>
                                        </li> -->
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                                class="nav-link active show">Mes coordonnes</a>
                                        </li>
                                        @if($user->doctor != null )
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                                    class="nav-link">Mise a jour</a>
                                            </li>
                                        @endif

                                    </ul>
                                    <div class="tab-content">
                                        <!-- <div id="my-posts" class="tab-pane fade active ">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
                                                    <a href="javascript:void(0);" class="btn btn-primary light px-3" data-bs-toggle="modal" data-bs-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
                                                     Modal
                                                    <div class="modal fade" id="linkModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Social Links</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <a class="btn-social facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                                                    <a class="btn-social google-plus" href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
                                                                    <a class="btn-social linkedin" href="javascript:void(0)" ><i class="fab fa-linkedin-in"></i></a>
                                                                    <a class="btn-social instagram" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                                                                    <a class="btn-social twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                                                    <a class="btn-social youtube" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                                                    <a class="btn-social whatsapp" href="javascript:void(0)"><i class="fab fa-whatsapp"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#cameraModal"><i class="fa fa-camera m-0"></i></a>
                                                     Modal
                                                    <div class="modal fade" id="cameraModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Upload images</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="input-group flex-nowrap mb-3">
                                                                        <span class="input-group-text">Upload</span>
                                                                        <div class="form-file border-left-end overflow-hidden">
                                                                            <input type="file" class="form-file-input form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">Post</a>
                                                    <!-- Modal
                                                    <div class="modal fade" id="postModal">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Post</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <textarea name="textarea" id="textarea1" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
                                                                        <a class="btn btn-primary" href="javascript:void(0)">Post</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html"><h3 class="text-black">Collection of textile samples lay spread</h3></a>
                                                    <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary me-2"><span class="me-2"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="images/profile/9.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html"><h3 class="text-black">Collection of textile samples lay spread</h3></a>
                                                    <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary me-2"><span class="me-2"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                                <div class="profile-uoloaded-post pb-3">
                                                    <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html"><h3 class="text-black">Collection of textile samples lay spread</h3></a>
                                                    <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary me-2"><span class="me-2"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div id="about-me" class="tab-pane fade show active">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p class="mb-2">{{ $doctor->description ?? 'A wonderful serenity has with my whole heart. I was created for the bliss, that I my talents.' }}</p>
                                                    <p>{{ $doctor->competences ?? 'A collection of textile samples lay spread out on it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.' }}</p>
                                                </div>
                                            </div>

                                            <div class="profile-skills mb-5">
                                                <h4 class="text-primary mb-2">Skills</h4>
                                                <a href="javascript:void()"
                                                   class="btn btn-primary light btn-xs mb-1">{{ $doctor->specialite ?? 'Not specified' }}</a>
                                                <!-- Ajoute d'autres compétences ici si nécessaire -->
                                            </div>
                                            <!--
                                                                                    <div class="profile-lang mb-5">
                                                                                        <h4 class="text-primary mb-2">Language</h4>
                                                                                        -Affiche les langues ici si nécessaire
                                                                                    </div> -->

                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>{{ $user->firstname }} {{ $user->lastname }}</span></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>{{ $user->email ?? 'Not available' }}</span></div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>{{ $doctor->age ?? 'Not specified' }} </span>ans
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Location <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <span>{{ $doctor->hopital ?? 'Not specified' }}</span></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Year Experience <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $doctor->annee_experience ?? 'Not specified' }} Year Experiences</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Mise a jour</h4>
                                                    <form method="POST" action="{{ route('doctor.update') }}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>Prénom</label>
                                                                <input type="text" name="firstname"
                                                                       value="{{ $user->firstname }}"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Nom</label>
                                                                <input type="text" name="lastname"
                                                                       value="{{ $user->lastname }}"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Email</label>
                                                                <input type="email" name="email"
                                                                       value="{{ $user->email }}" class="form-control"
                                                                       readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Hôpital</label>
                                                                <input type="text" name="hopital"
                                                                       value="{{ $doctor->hopital ?? '' }}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Spécialité</label>
                                                            <input type="text" name="specialite"
                                                                   value="{{ $doctor->specialite ?? '' }}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Adresse</label>
                                                            <input type="text" name="adresse"
                                                                   value="{{ $doctor->adresse ?? '' }}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>Âge</label>
                                                                <input type="number" name="age"
                                                                       value="{{ $doctor->age ?? '' }}"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Années d'expérience</label>
                                                                <input type="number" name="annee_experience"
                                                                       value="{{ $doctor->annee_experience ?? '' }}"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Compétences</label>
                                                            <textarea name="competences"
                                                                      class="form-control">{{ $doctor->competences ?? '' }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="description"
                                                                      class="form-control">{{ $doctor->description ?? '' }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Photo</label>
                                                            <input type="file" name="photo" class="form-control">
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Mettre à jour
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
