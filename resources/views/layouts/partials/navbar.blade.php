<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
            <div class="collapse" id="search-nav">
                <form action="/search" method="POST" class="navbar-left navbar-form nav-search mr-md-3">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pr-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Rechercher ..." class="form-control">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="index.html#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="\img/profile.jpg" alt="..." class="avatar-img rounded-circle"> 
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="\img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h4>
                                        <p class="text-muted">{{ auth()->user()->email }}</p><a href="http://demo.themekita.com/atlantis/livepreview/examples/demo1/profile.html" class="btn btn-xs btn-secondary btn-sm">Voir le profil</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Déconnexion</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
