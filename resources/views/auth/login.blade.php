<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <!-- Meta -->
    <base href="../../../">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin dashboard, admin template, administration, analytics, bootstrap, disease, doctor, elegant, health, hospital admin, medical dashboard, modern, responsive admin dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="">
	<meta name="description" content="Welly is a clean-code, responsive HTML Admin template that can be easily customized to fit the needs of various hospital, medical dashboard, health, doctor, and other businesses.">
	<meta property="og:title" content="Welly - Hospital Admin Dashboard Bootstrap HTML Template">
	<meta property="og:description" content="Welly is a clean-code, responsive HTML Admin template that can be easily customized to fit the needs of various hospital, medical dashboard, health, doctor, and other businesses.">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title -->
	<title>Welly - Hospital Admin Dashboard Bootstrap HTML Template</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form action="{{ route('login') }}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">E-mail</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text"
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    name="email"
                                                    id="email"
                                                    placeholder="Enter votre addresse email"
                                                    oninput="checkUser()">
                                        @error('email')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label></div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password"
                                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                    name="password"
                                                    id="password"
                                                    placeholder="Enter votre mot de passe">
                                            @error('password')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group d-none" id="content_confirm_password">
                                        <label for="confirm_password" class="form-label">Confirmation de mot de passe</label>
                                        <input type="password" name="confirm_password" class="form-control form-control-merge @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                                        @error('confirm_password')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="page-register.html">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
       <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
     <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="{!! asset('./assets/js/functions.js') !!}"></script>

<script>
    function checkUser(){
        var email = $('#email').val()

        // console.log(email)

        var route = '{{ route("recover_user.email", ":email") }}';
            route = route.replace(':email', email);
        $.get(route, function(data) {
            if (data.response) {
                $('#content_confirm_password').removeClass('d-none')
            }else{
                $('#content_confirm_password').addClass('d-none')
            }
        });
    }

    window.onload = checkUser()

    @if(Session::has('User unactive'))
        message_alert('danger',"Votre compte est désactivé. Vous n'avez plus les drois pour vous connecter sur cette plateforme !")
    @endif

    @if(Session::has('password succes'))
        message_alert('success',"Vous avez modifier votre mot de passe. Veuillez vous reconnecter.")
    @endif

</script>


</body>



<!-- Mirrored from welly.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2025 13:48:32 GMT -->
</html>