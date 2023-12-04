<!-- Name -->
<div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"
           id="name" name="name" value="{{ old('name') }}" required>
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Specialty -->
<div class="mb-3">
    <label for="specialty" class="form-label">Spécialité</label>
    <input type="text" class="form-control @error('specialty') is-invalid @enderror"
           id="specialty" name="specialty" value="{{ old('specialty') }}" required>
    @error('specialty')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Image -->
<!-- You may want to use a file input for the image -->

<!-- Email -->
<div class="mb-3">
    <label for="email" class="form-label">Adresse Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror"
           id="email" name="email" value="{{ old('email') }}" required>
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Status -->
<div class="mb-3">
    <label for="status" class="form-label">Statut</label>
    <select name="status" class="form-select" id="status">
        <option value="1">Actif</option>
        <option value="0">Inactif</option>
    </select>
</div>

<!-- Password -->
<div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror"
           id="password" name="password" required>
    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Date of Birth -->
<div class="mb-3">
    <label for="date_of_birth" class="form-label">Date de Naissance</label>
    <input type="text" class="form-control datepicker @error('date_of_birth') is-invalid @enderror"
           id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
    @error('date_of_birth')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Phone Number -->
<div class="mb-3">
    <label for="phone_number" class="form-label">Numéro de Téléphone</label>
    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
           id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
    @error('phone_number')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Wilaya -->
<div class="mb-3">
    <label for="wilaya" class="form-label">Wilaya</label>
    <input type="text" class="form-control @error('wilaya') is-invalid @enderror"
           id="wilaya" name="wilaya" value="{{ old('wilaya') }}">
    @error('wilaya')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Commune -->
<div class="mb-3">
    <label for="commune" class="form-label">Commune</label>
    <input type="text" class="form-control @error('commune') is-invalid @enderror"
           id="commune" name="commune" value="{{ old('commune') }}">
    @error('commune')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Location -->
<div class="mb-3">
    <label for="location" class="form-label">Localisation</label>
    <input type="text" class="form-control @error('location') is-invalid @enderror"
           id="location" name="location" value="{{ old('location') }}">
    @error('location')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Sexe -->
<div class="mb-3">
    <label for="sexe" class="form-label">Sexe</label>
    <select name="sexe" class="form-select" id="sexe">
        <option value="male">Homme</option>
        <option value="female">Femme</option>
    </select>
</div>

<!-- About -->
<div class="mb-3">
    <label for="about" class="form-label">À Propos</label>
    <textarea class="form-control @error('about') is-invalid @enderror"
              id="about" name="about">{{ old('about') }}</textarea>
    @error('about')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Availability Start -->
<div class="mb-3">
    <label for="availability_start" class="form-label">Disponibilité (Début)</label>
    <input type="text" class="form-control datetimepicker @error('availability_start') is-invalid @enderror"
           id="availability_start" name
