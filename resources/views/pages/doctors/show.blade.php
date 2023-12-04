@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Ta7ssil</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">CRM</a></li>
                                <li class="breadcrumb-item active">CRM</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Détails du Médecin</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Display Doctor Details -->
                                    <h4 class="mt-2">Informations du Médecin</h4>

                                    <dl class="row">
                                        <dt class="col-sm-4">Nom :</dt>
                                        <dd class="col-sm-8">{{ $doctor->name }}</dd>

                                        <dt class="col-sm-4">Numéro de Téléphone :</dt>
                                        <dd class="col-sm-8">{{ $doctor->phone_number }}</dd>

                                        <dt class="col-sm-4">Date de Naissance :</dt>
                                        <dd class="col-sm-8">{{ $doctor->date_of_birth }}</dd>

                                        <dt class="col-sm-4">Spécialité :</dt>
                                        <dd class="col-sm-8">{{ $doctor->specialty }}</dd>

                                        <dt class="col-sm-4">Sexe :</dt>
                                        <dd class="col-sm-8">{{ $doctor->sexe }}</dd>

                                        <dt class="col-sm-4">Localisation :</dt>
                                        <dd class="col-sm-8">{{ $doctor->location }}</dd>

                                        <dt class="col-sm-4">Wilaya :</dt>
                                        <dd class="col-sm-8">{{ $doctor->wilaya }}</dd>

                                        <dt class="col-sm-4">Commune :</dt>
                                        <dd class="col-sm-8">{{ $doctor->commune }}</dd>


                                        <dt class="col-sm-4">Adresse Email :</dt>
                                        <dd class="col-sm-8">{{ $doctor->email }}</dd>

                                        <dt class="col-sm-4">À Propos :</dt>
                                        <dd class="col-sm-8">{{ $doctor->about }}</dd>




                                    </dl>
                                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Retour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
