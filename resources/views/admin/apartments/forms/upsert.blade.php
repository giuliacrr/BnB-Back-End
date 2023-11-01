<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf()
    @method($method)
    <div class="mb-3">
        {{-- title --}}
        <label class="form-label fw-bold">Titolo:</label>
        <input type="text" name="title" value="{{ old('title', $apartment?->title) }}"
            class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- rooms number --}}
        <label class="form-label fw-bold">Numero di stanze:</label>
        <input type="number" name="rooms_number" value="{{ old('rooms_number', $apartment?->rooms_number) }}"
            class="form-control @error('rooms_number') is-invalid @enderror">
        @error('rooms_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- beds number --}}
        <label class="form-label fw-bold">Numero di letti:</label>
        <input type="number" name="beds_number" value="{{ old('beds_number', $apartment?->beds_number) }}"
            class="form-control @error('beds_number') is-invalid @enderror">
        @error('beds_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- rooms number --}}
        <label class="form-label fw-bold">Numero di bagni:</label>
        <input type="number" name="bathrooms_number"
            value="{{ old('bathrooms_number', $apartment?->bathrooms_number) }}"
            class="form-control @error('bathrooms_number') is-invalid @enderror">
        @error('bathrooms_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- square meters --}}
        <label class="form-label fw-bold">Grandezza casa:</label>
        <input type="number" name="square_meters" value="{{ old('bathrooms_number', $apartment?->square_meters) }}"
            class="form-control @error('square_meters') is-invalid @enderror">
        @error('square_meters')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- address --}}
        <label class="form-label fw-bold">Indirizzo:</label>
        <input type="text" name="address" value="{{ old('address', $apartment?->address) }}"
            class="form-control @error('address') is-invalid @enderror">
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- thumbnail --}}
        <label class="form-label fw-bold">Immagine:</label>
        <input type="text" name="thumbnail" value="{{ old('thumbnail', $apartment?->thumbnail) }}"
            class="form-control @error('thumbnail') is-invalid @enderror">
        @error('thumbnail')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- visibility --}}
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="thumbnail"
                value="{{ old('visibility', $apartment?->visibility) }}" id="apartmentVisibilityCheck">
            <label class="form-check-label" for="apartmentVisibilityCheck">
                Pubblicato
            </label>
            @error('visibility')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- button --}}
        <button type="submit" class="btn btn-outline-primary me-1 mt-4">Save</button>
        <a href="{{ route('admin.apartments.index') }}" class="btn btn-outline-primary mt-4">Cancel</a>
</form>
