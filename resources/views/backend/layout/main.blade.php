<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/themeAssets/assets/css/app.css') }}" type="image/png" />
    <!--plugins-->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/themeAssets/assets/plugins/notifications/css/lobibox.min.css') }}" />
    <link href="{{ asset('backend/assets/themeAssets/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/themeAssets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/themeAssets/assets/plugins/metismenu/css/metisMenu.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/themeAssets/assets/plugins/bs-stepper/css/bs-stepper.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/themeAssets/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />

    <!-- loader-->
    <link href="{{ asset('backend/assets/themeAssets/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/themeAssets/assets/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/themeAssets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/themeAssets/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('backend/assets/themeAssets/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/themeAssets/assets/plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('backend/assets/themeAssets/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/themeAssets/assets/css/icons.css') }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/themeAssets/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/themeAssets/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/themeAssets/assets/css/header-colors.css') }}" />
    <title>Gestion Budgetaire et Calcule des couts | Republique du Mali</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('backend/assets/themeAssets/assets/images/logo_mali.png') }}" class="logo-icon"
                        alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">GB-MALI</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="menu-label">Tableau de Bord</li>
                 <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon"><i class="bx bx-chalkboard"></i>
                        </div>
                        <div class="menu-title">Des Tableaux de Bord</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class='bx bx-radio-circle'></i>
                                Tableau de Bord I
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class='bx bx-radio-circle'></i>
                                Tableau de Bord II
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class='bx bx-radio-circle'></i>
                                Tableau de Bord III
                            </a>
                        </li>
                       
                    </ul>

                </li>
               
                <li class="menu-label">PROGRAMMES</li>
                <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon"><i class="bx bx-briefcase-alt-2"></i>
                        </div>
                        <div class="menu-title">Gestion des Programmes</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('programmes.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les programmes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('programmes.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter un programme
                            </a>
                        </li>
                       
                    </ul>

                </li>
                
                 <li class="menu-label">INFO ANNUELLES</li>
                <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon"><i class="bx bx-news"></i>
                        </div>
                        <div class="menu-title">Gestion des Infos</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('informationAnnuelles.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les Info 
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('informationAnnuelles.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter un Info
                            </a>
                        </li>
                       
                    </ul>

                </li>

                <li class="menu-label">ACTIONS</li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-traffic-cone'></i>
                        </div>
                        <div class="menu-title">Gestions des actions</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('actions.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les actions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('actions.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter une action
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-label">Methode Costings</li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-wallet-alt'></i>
                        </div>
                        <div class="menu-title">Gestions des méthodes</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('methodeCostings.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les méthodes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('methodeCostings.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter une méthode
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-label">Mode organisations</li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-blanket'></i>
                        </div>
                        <div class="menu-title">Gestions des modes</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('modeOrganisations.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les modes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('modeOrganisations.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter une mode
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-label">Chapitres</li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-notepad'></i>
                        </div>
                        <div class="menu-title">Gestions des chapitres</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('chapters.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les chapitres
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chapters.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter une chapitre
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-label">ACTIVITÉS BUDGÉTAIRES</li>
                <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon"><i class='bx bx-archive'></i>
                        </div>
                        <div class="menu-title">Gestions des activites budgétaires</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('activities.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les activités budgétaires
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('activities.create') }}">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter une activité budgétaire
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-radio-circle'></i>
                                Sous-activités budgétaires
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="menu-label">PROJETS</li>
                <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon"><i class="bx bx-repeat"></i>
                        </div>
                        <div class="menu-title">Gestions des projets </div>
                    </a>
                    <ul>
                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-bracket'></i>
                                Projets
                            </a>
                            <ul>
                                <li> 
                                    <a href="{{ route('projets.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les projets
                                    </a>
                                </li>
                                <li> 
                                    <a href="{{ route('projets.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter un projet
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-message-square-detail'></i>
                                Info annuelles projets 
                            </a>
                            <ul>
                                <li> 
                                    <a href="{{ route('infoAnnuelArojets.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les info annuelles
                                    </a>
                                </li>
                                <li> 
                                    <a href="{{ route('infoAnnuelArojets.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter un info annuelle
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-collection'></i>
                                Composants projets
                            </a>
                            <ul>
                                <li> 
                                    <a href="{{ route('composants.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les composants
                                    </a>
                                </li>
                                <li> 
                                    <a href="{{ route('composants.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter un composant
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-brush-alt'></i>
                                Tâches composants
                            </a>
                            <ul>
                                <li> 
                                    <a href="{{ route('taches.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les tâches
                                    </a>
                                </li>
                                <li> 
                                    <a href="{{ route('taches.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter une tâche
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <li class="menu-label">SOURCE DE FINANCEMENT</li>
                <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                        </div>
                        <div class="menu-title">Gestions des sources de financements</div>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class='bx bx-radio-circle'></i>
                                Voir tous les sources
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-radio-circle'></i>
                                Ajouter une source
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="menu-label">RAPPORTS</li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-printer'></i>
                        </div>
                        <div class="menu-title">Générer & Voir les rapports</div>
                    </a>
                </li>
                
                <li class="menu-label">GESTIONS DES COMPTES</li>

                <li>
                    <a class="has-arrow" href="#">
                        <div class="parent-icon">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">Gestions des sécurités</div>
                    </a>
                    <ul>
                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-radio-circle'></i>
                                Gestions des permissions
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('permissions.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les permissions
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('permissions.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter une permissions
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-radio-circle'></i>
                                Gestions des rôles
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('roles.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les rôles
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('roles.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter une rôles
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-radio-circle'></i>
                                Gestions des ministères
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('ministeres.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les ministères
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ministeres.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter une ministères
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-radio-circle'></i>
                                Gestions des sections
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('sections.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les sections
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('sections.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter une section
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="#">
                                <i class='bx bx-radio-circle'></i>
                                Gestions des utilisateur
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('users.index') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Voir tous les utilisateur
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.create') }}">
                                        <i class='bx bx-radio-circle'></i>
                                        Ajouter une utilisateur
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
               
                <li class="menu-label">PARAMETRES</li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-wrench'></i>
                        </div>
                        <div class="menu-title">Configuerer l'application </div>
                    </a>
                </li>
                
                <li class="menu-label">AIDES</li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-question-mark'></i>
                        </div>
                        <div class="menu-title">Accès au support l'aide </div>
                    </a>
                </li>

            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>

                    <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <input class="form-control px-5" disabled type="search" placeholder="Search">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                class='bx bx-search'></i></span>
                    </div>


                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center gap-1">
                            <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                                data-bs-target="#SearchModal">
                                <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                                    data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22"
                                        alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/01.png" width="20"
                                                alt=""><span class="ms-2">English</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/02.png" width="20"
                                                alt=""><span class="ms-2">Catalan</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/03.png" width="20"
                                                alt=""><span class="ms-2">French</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/04.png" width="20"
                                                alt=""><span class="ms-2">Belize</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/05.png" width="20"
                                                alt=""><span class="ms-2">Colombia</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/06.png" width="20"
                                                alt=""><span class="ms-2">Spanish</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/07.png" width="20"
                                                alt=""><span class="ms-2">Georgian</span></a>
                                    </li>
                                    <li><a class="dropdown-item d-flex align-items-center py-2"
                                            href="javascript:;"><img src="assets/images/county/08.png" width="20"
                                                alt=""><span class="ms-2">Hindi</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dark-mode d-none d-sm-flex">
                                <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-app">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                                    href="javascript:;"><i class='bx bx-grid-alt'></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="app-container p-2 my-2">
                                        <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/slack.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Slack</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/behance.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Behance</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/google-drive.png"
                                                                width="30" alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Dribble</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/outlook.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Outlook</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/github.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">GitHub</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/stack-overflow.png"
                                                                width="30" alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Stack</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/figma.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Stack</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/twitter.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Twitter</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/google-calendar.png"
                                                                width="30" alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Calendar</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/spotify.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Spotify</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/google-photos.png"
                                                                width="30" alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Photos</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/pinterest.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Photos</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/linkedin.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">linkedin</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/dribble.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Dribble</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/youtube.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">YouTube</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/google.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">News</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/envato.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Envato</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="assets/images/app/safari.png" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1">Safari</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div><!--end row-->

                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                    href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-badge">8 New</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-1.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson<span
                                                            class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger">dc
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-2.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span
                                                            class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success">
                                                    <img src="assets/images/app/outlook.png" width="25"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Account Created<span
                                                            class="msg-time float-end">28 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully created new email</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info">Ss
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                            class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-4.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span
                                                            class="msg-time float-end">15
                                                            min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span
                                                            class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary">
                                                    <img src="assets/images/app/github.png" width="25"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span
                                                            class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-8.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span
                                                            class="msg-time float-end">6 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">
                                            <button class="btn btn-primary w-100">View All Notifications</button>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="alert-count">8</span>
                                    <i class='bx bx-shopping-bag'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">My Cart</p>
                                            <p class="msg-header-badge">10 Items</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/11.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/02.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/03.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/04.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/05.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/06.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/07.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/08.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="assets/images/products/09.png" class=""
                                                            alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                    <p class="cart-product-price mb-0">1 X $29.00</p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0">$250</p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <h5 class="mb-0">Total</h5>
                                                <h5 class="mb-0 ms-auto">$489.00</h5>
                                            </div>
                                            <button class="btn btn-primary w-100">Checkout</button>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown px-3">
                        <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (!empty(auth()->user()->avatar))
                                <img src="{{ asset('backend/assets/themeAssets/assets/users/' . auth()->user()->avatar) }}"
                                    class="user-img" alt="user avatar">
                            @else
                                <img src="{{ asset('backend/assets/themeAssets/assets/users/default-img.png') }}"
                                    class="user-img" alt="user avatar">
                            @endif
                            @auth
                                <div class="user-info">
                                    <p class="user-name mb-0">{{ auth()->user()->prenom . ' ' . auth()->user()->nom }}</p>
                                    <p class="designattion mb-0">{{ trim(auth()->user()->getRoleNames(), '[""]') }}</p>
                                </div>
                            @endauth
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        class="bx bx-user fs-5"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        class="bx bx-cog fs-5"></i><span>Settings</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        class="bx bx-download fs-5"></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="bx bx-log-out-circle"></i>
                                    <span>Déconnexion</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @if (session('success'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Succès</h6>
                                <div class="text-white">{{ session('success') }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @elseif(session('info'))
                    <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bx-info-square'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Information</h6>
                                <div class="text-dark">{{ session('info') }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @elseif(session('avert'))
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Avertissement</h6>
                                <div class="text-dark">{{ session('avert') }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Erreur</h6>
                                <div class="text-white">{{ session('error') }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>

        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. All right reserved.</p>
        </footer>
    </div>


    <!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-list">
                        <p class="mb-1">Html Templates</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Web Designe Company</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Software Development</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Online Shoping Portals</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search modal -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/themeAssets/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('backend/assets/themeAssets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}">
    </script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('backend/assetsthemeAssets/assets/plugins/bs-stepper/js/main.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/select2/js/select2-custom.js') }}"></script>

    <!--notification js -->
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/plugins/notifications/js/notification-custom-script.js') }}">
    </script>
    <script src="{{ asset('backend/assetsthemeAssets/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assetsthemeAssets/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}">
    </script>

    <!--app JS-->
    <script src="{{ asset('backend/assets/themeAssets/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backend/assets/themeAssets/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @yield('script')
</body>

</html>
