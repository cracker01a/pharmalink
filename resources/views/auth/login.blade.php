<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <base href="{{ asset('./') }}">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion pharmalink</title>
    <link rel="stylesheet" href="path/vers/style.css">

    <link href="css/style.css" rel="stylesheet">
    <style>
                    /* Animation au chargement */
                    body {
                background: url('images/logo.png') no-repeat center center fixed;
                background-size: cover; /* L'image couvre toute la page */
            }
            .authincation-content {
                background: rgba(255, 255, 255, 0.2); /* Légère transparence */
                backdrop-filter: blur(5px); /* Effet de flou */
                padding: 70px;
                border-radius: 10px;

            }


        .auth-form {
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Effet sur les champs */
        .form-control {
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus {
            transform: scale(1.05);
            border-color: #4CAF50;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.5);
        }

        /* Animation du bouton */
        .btn:hover {
            transform: scale(1.1);
            transition: all 0.3s ease-in-out;
        }
                .logo-small {
            width: 40px; /* Ajuste la largeur */
            height: auto; /* Garde les proportions */
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px; /* Espacement entre les images */
        }
        .logo-compact {
                max-width: 100%; /* Empêche l’image de dépasser son conteneur */
                height: auto; /* Garde les proportions */
            }

            @media (max-width: 768px) { /* Pour les écrans mobiles */
                .logo-compact {
                    max-width: 80%; /* Réduit la taille sur mobile */
                    display: block;
                    margin: 0 auto; /* Centre l'image */
                }
            }
                            @keyframes bounceLogo {
                    0%, 100% { transform: translateY(0); }
                    50% { transform: translateY(-10px); }
                }

                .logo-compact {
                    animation: bounceLogo 2s ease-in-out infinite;
                }



        /* Effet de secousse si erreur */
        .error {
            animation: shake 0.3s ease-in-out;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }
    </style>
</head>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="authincation-content">
                        <div class="auth-form">
                            <h4 class="text-center mb-4 text-white">Connexion</h4>
                            <a href="index.html" class="brand-logo">
                            <img class="logo-small me-2" src="images/logo.png" alt="Logo">
                                <img class="logo-compact" src="images/logo-text.png" alt="">

                            </a>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Email</strong></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email" required>
                                    <span id="email-error" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Mot de passe </strong></label>
                                    <input type="password" name="password" class="form-control" autocomplete="new-password" placeholder="Entrez votre mot de passe" required>
                                </div>
                                <div class="form-group" id="password-confirm-group" style="display: none;">
                                    <label><strong>Confirmer le mot de passe</strong></label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-white text-primary btn-block">Se connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label><strong>Email</strong></label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label><strong>Mot de passe</strong></label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group" id="password-confirm-group" style="display: none;">
            <label><strong>Confirmer le mot de passe</strong></label>
            <input type="password" name="confirm_password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form> -->


    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let email = document.getElementById("email");
            let password = document.getElementById("password");

            if (email.value === "" || password.value === "") {
                if (email.value === "") email.classList.add("error");
                if (password.value === "") password.classList.add("error");
                setTimeout(() => {
                    email.classList.remove("error");
                    password.classList.remove("error");
                }, 300);
            } else {
                alert("Form submitted successfully!");
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let emailField = $('#email');
        let passwordConfirmGroup = $('#password-confirm-group');
        let emailError = $('#email-error');

        emailField.on('input', function () {
            emailError.text(''); // Effacer le message d'erreur si l'utilisateur modifie l'email
        });

        emailField.on('blur', function () {
            let email = $(this).val();
            if (email) {
                $.ajax({
                    url: '/check-email',
                    type: 'POST',
                    data: { email: email, _token: '{{ csrf_token() }}' },
                    success: function (response) {
                        if (response.password_is_null) {
                            passwordConfirmGroup.show(); // Afficher "Confirmer le mot de passe"
                        } else {
                            passwordConfirmGroup.hide(); // Masquer "Confirmer le mot de passe"
                        }
                    },
                    error: function () {
                        emailError.text('Email non trouvé.').css('color', 'red'); // Afficher le message d'erreur
                        passwordConfirmGroup.hide(); // Cacher "Confirmer le mot de passe"
                    }
                });
            }
        });
    });
</script>


</body>
</html>
