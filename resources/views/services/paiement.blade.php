

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"/>
<link rel="stylesheet" href="./assets/css/style.css" />

<div class="container bg-light d-md-flex align-items-center">
    <div class="card box1 shadow-sm p-md-5 p-md-5 p-4" style="background-color: #e21111;">
        <div class="fw-bolder mb-4"><span class="fas fa-dollar-sign">
            </span>
            <span class="ps-1" style="color: #ffff">599,00</span>
        </div>
        <div class="d-flex flex-column">
            {{-- <div class="d-flex align-items-center justify-content-between text">
                <span class="">Commission</span>
                <span class="fas fa-dollar-sign">
                    <span class="ps-1">1.99</span>
                </span>
            </div> --}}
            <div class="d-flex align-items-center justify-content-between text mb-4">
                <span style="color: #ffff">Total</span>
                <span class="fas fa-dollar-sign">
                    <span class="ps-1" style="color: #ffff">600.99</span>
                </span>
            </div>
            <div class="border-bottom mb-4">
            </div>
            {{-- <div class="d-flex flex-column mb-4">
                <span class="far fa-file-alt text">
                    <span class="ps-2">Invoice ID:</span>
                </span> <span class="ps-3">SN8478042099</span>
            </div> --}}
            <div class="d-flex flex-column mb-5">
                <span class="far fa-calendar-alt text" style="color: #ffff">
                    <span class="ps-2" style="color: #ffff">Date du Paiement:</span>
                </span>
                <span class="ps-3" style="color: #ffff">22 Mars 2022</span>
            </div>
            <div class="d-flex align-items-center justify-content-between text mt-5">
                <div class="d-flex flex-column text">
                    {{-- <span style="color: #ffff; font-size: 20px">KayJob</span> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="card box2 shadow-sm">
        <div class="d-flex align-items-center justify-content-between p-md-5 p-4">
            <span class="h5 fw-bold m-0">Effectuer un Paiement</span>
            <div class="btn btn-primary bar">
            </div>
        </div>
        <div class="px-md-5 px-4 mb-4 d-flex align-items-center">
        </div>
        <form action="">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Numéro de téléphone</span>
                        <div class="inputWithIcon">
                             <input class="form-control" type="text"
                                placeholder="77 123 45 67" name="telephone"> <span class=""> <img
                                    src="./assets/img/wave.png"
                                    alt=""></span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span><span
                                class="ps-1">ID de la transaction</span></span>
                        <div class="inputWithIcon"> <input type="text" class="form-control" name="idTransaction"> <span
                                ></span> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Montant</span>
                        <div class="inputWithIcon"> <input type="text" class="form-control" name="montant">
                         </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Nom de la personne</span>
                        <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                value="" placeholder="Nom de la personne" name="nom"> <span class="far fa-user" style="color: #e21111"></span> </div>
                    </div>
                </div>
                <div class="col-12 px-md-5 px-4 mt-3">
                    <div class="btn btn-primary w-100" style="background-color: #e21111"><strong>Enregistrer paiement</strong></div>
                </div>
            </div>
        </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </div>
</div>
