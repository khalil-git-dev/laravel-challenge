@extends('parents.master')

@section('contenu')
    
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if (!empty($etudiant->avatarUser()))
                    <img class="rounded-circle mt-5" alt="avatar etudiant" src="{{ $etudiant->avatarUser() }}" width="250">                   
                @else
                    <img class="rounded-circle mt-5" src="{{ asset('images/defaultAvatar.png') }}">                   
                @endif 
                <h3 class="font-weight-bold">{{ $etudiant->matricule }}</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3">
                <div class="d-flex justify-content-between ">
                    <h4 class="text-right">Profil étudiant</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Prénom</label>
                        <input type="text" readonly="true" value="{{ $etudiant->prenom }}" class="form-control"  placeholder="Votre prenom">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Nom</label>
                        <input type="text" readonly="true" class="form-control" value="{{ $etudiant->nom }}" placeholder="Votre nom">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Téléphone</label>
                        <input type="text" readonly="true" value="{{ $etudiant->telephone }}" class="form-control" placeholder="enter phone number">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Adresse</label>
                        <input type="text" readonly="true" value="{{ $etudiant->email }}" class="form-control" placeholder="enter address">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <input type="text" readonly="true" value="{{ $etudiant->age }}" class="form-control" placeholder="enter email id">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Classe</label>
                        <input type="text" readonly="true" value="{{ $etudiant->classe->code ." : ". $etudiant->classe->libelle }}" class="form-control" placeholder="enter email id" >
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="labels">Classe</label>
                        <select name="" class="form-control">
                            <option value="">eee</option>
                        </select>
                    </div> --}}
                </div>
                
                <div class="row mt-5 ml-5">
                    <a class="btn btn-primary profile-button  ml-5" type="button" href="{{ route('etudiants.edit', $etudiant->id) }}" ><i class="fa fa-edit"></i> Modifier</a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger profile-button ml-3"><i class="fa fa-trash"></i> Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>

@endsection