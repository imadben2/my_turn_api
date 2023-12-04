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
                        <h4 class="page-title">Les Médecins</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-11">
                                    <!-- Form to Add a New Record -->
                                    <h4 class="mt-2">Ajouter un Médecin</h4>

                                    <form action="{{ route('doctors.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Name -->
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nom</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                           id="name" name="name" value="{{ old('name') }}" required>
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Phone Number -->
                                                <div class="mb-3">
                                                    <label for="phone_number" class="form-label">Numéro de Téléphone</label>
                                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                                           id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                                                    @error('phone_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Date of Birth -->
                                                <div class="mb-3">
                                                    <label for="date_of_birth" class="form-label">Date de Naissance</label>
                                                    <input type="text" class="form-control datepicker @error('date_of_birth') is-invalid @enderror"
                                                           id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                                    @error('date_of_birth')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Specialty -->
                                                <div class="mb-3">
                                                    <label for="specialty" class="form-label">Spécialité</label>
                                                    <input type="text" class="form-control @error('specialty') is-invalid @enderror"
                                                           id="specialty" name="specialty" value="{{ old('specialty') }}" required>
                                                    @error('specialty')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Sexe -->
                                                <div class="mb-3">
                                                    <label for="sexe" class="form-label">Sexe</label>
                                                    <select name="sexe" class="form-select" id="sexe">
                                                        <option value="male">Homme</option>
                                                        <option value="female">Femme</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Location -->
                                                <div class="mb-3">
                                                    <label for="location" class="form-label">Localisation</label>
                                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                                           id="location" name="location" value="{{ old('location') }}">
                                                    @error('location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Wilaya -->
                                                <div class="mb-3">
                                                    <label for="wilaya" class="form-label">Wilaya</label>
                                                    <select name="wilaya" class="form-select mb-3" required>
                                                        @foreach ($items as $item)
                                                            <option value="{{ $item->codeW }}"> {{ $item->wilaya }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Commune -->
                                                <div class="mb-3">
                                                    <label for="commune" class="form-label">Commune</label>
                                                    <select required id="commune" name="commune" class="form-control">
                                                        <option value="" selected disabled>إختر بلدية</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Password -->
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Mot de passe</label>
                                                    <input type="password"  class="form-control @error('password') is-invalid @enderror"
                                                           id="password" name="password" required>
                                                    @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Email -->
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Adresse Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                           id="email" name="email"  required>
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <!-- About -->
                                            <label for="about" class="form-label">À Propos</label>
                                            <textarea class="form-control @error('about') is-invalid @enderror"
                                                      id="about" name="about">{{ old('about') }}</textarea>
                                            @error('about')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Annuler</a>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('select[name="wilaya"]').on('change', function () {
                var wilaya = $(this).val();
                if (wilaya) {
                    $.ajax({
                        url: "{{ URL::to('getCommune') }}/" + wilaya,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="commune"]').empty();
                            $('#commune').focus;
                            $.each(data, function (key, value) {
                                $('select[name="commune"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });


        });

    </script>
@endsection
