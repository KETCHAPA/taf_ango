@extends('layouts.template')
@section('title', 'Nouvel employé')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ajout d'un employé</div>
                </div>
                <form action="/employee/store" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Nom</label>
                                    <input required type="text" name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Prénom</label>
                                    <input required type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input required type="text" class="form-control" id="login" name="login">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input required type="password" id="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="password2">Confirmer mot de passe</label>
                                    <input required type="password" id="password2" class="form-control" name="password2">
                                </div>
                                <div class="form-group">
                                    <label for="address">Adresse</label>
                                    <input required type="text" id="address" class="form-control" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input required type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="cni">Numéro de cni</label>
                                    <input required type="text" id="cni" class="form-control" name="cni">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                        <label for="age">Age</label>
                                        <input required type="number" name="age" class="form-control" id="age">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Poste</label>
                                        <select type="text" id="role" class="form-control" name="role">
                                            <option value="Chauffeur">Chauffeur</option>
                                            <option value="Guichetier">Guichetier</option>
                                            <option value="Administrateur">Administrateur</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">Numéro de téléphone</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+237</span>
                                            </div>
                                            <input required type="text" name="tel" id="tel" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="reset" class="btn btn-warning pull-right">Reinitialiser</button>
                        <button onclick="window.location.href='javascript:history.back()'" class="btn btn-dark">Retour</button>
                        <button class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type')}}";
            switch(type) {
                case 'info': 
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success': 
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error': 
                    toastr.error("{{ Session::get('message') }}");
                    break;
                case 'warning': 
                    toastr.warning("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
@endsection