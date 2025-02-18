@extends('partials.master')

@section('content')

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Ordonnance</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)"></a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faire Une Nouvelle Ordonnance</h4>
                    </div>
                    <div class="card-body">
                        <div id="form-wizard" class="form-wizard order-create">
                            <div class="tab-content">
                                <div id="wizard_Service" class="tab-pane active" role="tabpanel">
                                    <h3>Informations Du Patients</h3>
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Prénom(s) du patient<span
                                                        class="required">*</span></label>
                                                <input type="text" name="firstName" class="form-control"
                                                       placeholder="Parsley" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Nom du patient<span class="required">*</span></label>
                                                <input type="text" name="lastName" class="form-control"
                                                       placeholder="Montana" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Sexe<span
                                                        class="required">*</span></label>
                                                <select name="gender" class="form-select">
                                                    <option value="Masculin">Masculin</option>
                                                    <option value="Feminin">Feminin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Job<span class="required">*</span></label>
                                                <input type="text" name="job" class="form-control"
                                                       placeholder="Chômeur" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Date de naissance<span
                                                        class="required">*</span></label>
                                                <input type="date" class="form-control" name="birthdate" id="dob"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Age<span class="required">*</span></label>
                                                <input type="text" name="age" id="age" class="form-control"
                                                       placeholder="Montana" required disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Email Address<span
                                                        class="required">*</span></label>
                                                <input type="email" class="form-control"
                                                       placeholder="example@example.com" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Phone Number<span
                                                        class="required">*</span></label>
                                                <input type="text" name="phoneNumber" class="form-control"
                                                       placeholder="(+1)408-657-9007" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Addresse<span
                                                        class="required">*</span></label>
                                                <input type="text" name="place" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Diagnostique<span
                                                        class="required">*</span></label>
                                                <input type="text" name="disease" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary next-step">Suivant</button>
                                </div>
                                <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                    <h3>Prescription</h3>
                                    <div class="row flex-row" id="dynamic_form">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="medication">Medicament</label>
                                                <input type="text" class="form-control" name="medication[]"
                                                       placeholder="Entrer le medicament">
                                            </div>
                                            <div class="form-group">
                                                <label for="posologie">Posologie</label>
                                                <input type="text" class="form-control" name="posologie[]"
                                                       placeholder="Entrer la posologie">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add-line">Ajouter une ligne
                                    </button>
                                    <button type="button" class="btn btn-secondary prev-step">Précédent</button>
                                    <button type="submit" id="submit-btn" class="btn btn-success">Soumettre</button>
                                </div>
                            </div>
                            <ul class="nav nav-wizard">
                                <li><a class="nav-link active" href="#wizard_Service"></a></li>
                                <li><a class="nav-link" href="#wizard_Time"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <div id="loader"
         class="position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75 d-flex align-items-center justify-content-center d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        // Fonction pour calculer l'âge en fonction de la date de naissance
        document.getElementById('dob').addEventListener('change', function () {
            var dob = new Date(this.value); // Date de naissance choisie
            var today = new Date(); // Date actuelle
            var age = today.getFullYear() - dob.getFullYear(); // Différence d'années

            // Si la date de naissance n'est pas encore passée cette année, soustraire un an
            var m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            // Mettre à jour le champ "Âge" avec la valeur calculée
            document.getElementById('age').value = age;
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formWizard = document.getElementById('form-wizard');
            const steps = formWizard.querySelectorAll('.nav-link');
            const tabPanes = formWizard.querySelectorAll('.tab-pane');
            const nextButtons = formWizard.querySelectorAll('.next-step');
            const prevButtons = formWizard.querySelectorAll('.prev-step');

            nextButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const currentStep = formWizard.querySelector('.nav-link.active');
                    const nextStep = currentStep.parentElement.nextElementSibling.querySelector('.nav-link');
                    if (nextStep) {
                        currentStep.classList.remove('active');
                        nextStep.classList.add('active');
                        const currentPane = formWizard.querySelector('.tab-pane.active');
                        currentPane.classList.remove('active');
                        const nextPane = document.querySelector(nextStep.getAttribute('href'));
                        nextPane.classList.add('active');
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const currentStep = formWizard.querySelector('.nav-link.active');
                    const prevStep = currentStep.parentElement.previousElementSibling.querySelector('.nav-link');
                    if (prevStep) {
                        currentStep.classList.remove('active');
                        prevStep.classList.add('active');
                        const currentPane = formWizard.querySelector('.tab-pane.active');
                        currentPane.classList.remove('active');
                        const prevPane = document.querySelector(prevStep.getAttribute('href'));
                        prevPane.classList.add('active');
                    }
                });
            });

            document.getElementById('add-line').addEventListener('click', function () {
                const dynamicForm = document.getElementById('dynamic_form');
                const newLine = dynamicForm.firstElementChild.cloneNode(true);
                newLine.querySelectorAll('input').forEach(input => input.value = '');
                dynamicForm.appendChild(newLine);
            });
        });




        $(document).ready(function () {

            $("#submit-btn").click(function () {
                $('#loader').removeClass('d-none');
                let serviceData = {
                    firstName: $("input[name='firstName']").val(),
                    lastName: $("input[name='lastName']").val(),
                    birthdate: $("input[name='birthdate']").val(),
                    email: $("input[type='email']").val(),
                    gender: $("select[name='gender']").val(),
                    job: $("input[name='job']").val(),
                    disease: $("input[name='disease']").val(),
                    phoneNumber: $("input[name='phoneNumber']").val(),
                    place: $("input[name='place']").val()
                };

                let timeData = [];
                $("#dynamic_form .form-group").each(function () {
                    let medication = $(this).find("input[name='medication[]']").val();
                    let posologie = $(this).find("input[name='posologie[]']").val();
                    timeData.push({medication, posologie});
                });

                $.ajax({
                    url: @json(route('Ordonnance.store')),
                    type: "POST",
                    data: JSON.stringify({serviceData, timeData}),
                    contentType: "application/json",
                    headers: {
                        "X-CSRF-TOKEN": @json(csrf_token()),
                    },
                    success: function (response) {

                        window.location.href = '{{ route("Ordonnance.index") }}';
                        $('#loader').addClass('d-none');

                    },
                    error: function (xhr) {
                        $('#loader').addClass('d-none');
                        // alert("Erreur lors de la soumission : " + xhr.responseText);
                        // console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>

@endsection
