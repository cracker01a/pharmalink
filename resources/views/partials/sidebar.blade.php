<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="{{route('home')}}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Tableau De Bord</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.create') }}">Ajout </a></li>
                    <li><a href="{{ route('users.index') }}">List</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Medicaments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('medications.create') }}">Ajout </a></li>
                    <li><a href="{{ route('medications.index') }}">List</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Patients</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('patients.create') }}">Ajout </a></li>
                    <li><a href="{{ route('patients.index') }}">List</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
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
            <p>Made with <span class="heart"></span> by XDev</p>
        </div>
    </div>
</div>
