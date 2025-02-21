<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a  href="{{ route('home') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Tableau de bord</span>
                </a>
            </li>
            @if(Auth::user()->id ==1  )
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.create') }}">Ajout </a></li>
                    <li><a href="{{ route('users.index') }}">List</a></li>
                </ul>
            </li>
            @endif
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-pills"></i>
                    <span class="nav-text">Medicaments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('medications.create') }}">Ajout </a></li>
                    <li><a href="{{ route('medications.index') }}">List</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-injured"></i>
                    <span class="nav-text">Patients</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('patients.create') }}">Ajout </a></li>
                    <li><a href="{{ route('patients.index') }}">List</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-file-prescription"></i>
                    <span class="nav-text">Ordonnance</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('Ordonnance.create') }}">Ajout </a></li>
                    <li><a href="{{ route('Ordonnance.index') }}">List</a></li>
                </ul>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>Welly Hospital Admin Dashboard</strong> © 2025 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>

<!-- Style CSS -->
<style>
    /* Animation de rotation pour les icônes */
    @keyframes rotateIcon {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Effet de rebond pour les éléments de la sidebar */
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .deznav ul li a {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    /* Animation des icônes lors du survol */
    .deznav ul li a:hover i {
        animation: rotateIcon 1s ease-in-out;
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.7); /* Effet lumineux sur l'icône */
        transform: scale(1.2); /* Agrandissement de l'icône */
    }

    /* Effet de survol sur l'élément entier */
    .deznav ul li a:hover {
        background-color:rgb(55, 171, 157); /* Changement de la couleur de fond sur survol */
        color: #fff; /* Couleur du texte lors du survol */
        border-radius: 5px; /* Bords arrondis */
        transform: translateX(10px); /* Déplacement léger de l'élément vers la droite */
    }

    /* Animation du texte sur survol */
    .deznav ul li a:hover .nav-text {
        animation: bounce 0.6s ease-in-out;
        font-weight: bold;
        color: #f7bc0c; /* Couleur du texte survolé */
    }

    /* Animation du sous-menu lors du survol */
    .deznav ul li a:hover + ul {
        display: block;
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .deznav ul li ul {
        display: none;
        opacity: 0;
        transform: translateY(-10px);
    }

    /* Animation d'apparition du sous-menu */
    .deznav ul li:hover > ul {
        display: block;
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    /* Option de style de fond */

</style>
