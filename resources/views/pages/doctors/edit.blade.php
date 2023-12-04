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
                                    <!-- Form to Update a Record -->
                                    <h4 class="mt-2">Modifier un Médecin</h4>

                                    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Use the PUT method for updates -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Name -->
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nom</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                           id="name" name="name" value="{{ old('name', $doctor->name) }}" required>
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
                                                           id="phone_number" name="phone_number" value="{{ old('phone_number', $doctor->phone_number) }}" required>
                                                    @error('phone_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Include other fields with similar structure -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Wilaya -->
                                                <div class="mb-3">
                                                    <label for="wilaya" class="form-label">Wilaya</label>
                                                    <select name="wilaya" class="form-select mb-3" required>
                                                        @foreach ($items as $item)
                                                            <option value="{{ $item->codeW }}" {{ $item->codeW == $doctor->wilaya ? 'selected' : '' }}>
                                                                {{ $item->wilaya }}
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
                                                        <!-- Populate communes based on the selected wilaya -->
                                                        <!-- You may need to use JavaScript to handle this dynamic behavior -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Password -->
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Mot de passe</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                           id="password" name="password">
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
                                                           id="email" name="email" value="{{ old('email', $doctor->email) }}" required>
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
                                                      id="about" name="about">{{ old('about', $doctor->about) }}</textarea>
                                            @error('about')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary">Modifier</button>
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
