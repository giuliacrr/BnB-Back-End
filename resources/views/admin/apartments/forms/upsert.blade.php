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
        <input type="number" min="1" name="rooms_number" value="{{ old('rooms_number', $apartment?->rooms_number) }}"
            class="form-control @error('rooms_number') is-invalid @enderror">
        @error('rooms_number')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- beds number --}}
        <label class="form-label fw-bold">Numero di letti:</label>
        <input type="number" min="1" name="beds_number" value="{{ old('beds_number', $apartment?->beds_number) }}"
            class="form-control @error('beds_number') is-invalid @enderror">
        @error('beds_number')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- bathrooms number --}}
        <label class="form-label fw-bold">Numero di bagni:</label>
        <input type="number" min="1" name="bathrooms_number"
            value="{{ old('bathrooms_number', $apartment?->bathrooms_number) }}"
            class="form-control @error('bathrooms_number') is-invalid @enderror">
        @error('bathrooms_number')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- square meters --}}
        <label class="form-label fw-bold">Grandezza casa:</label>
        <input type="number" min="1" name="square_meters" value="{{ old('square_meters', $apartment?->square_meters) }}"
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
        <div class="d-flex align-items-center mt-2">
            @if ($apartment?->thumbnail)
            <img style="width: 50px; height: 50px;" class="me-4 mt-2" src="{{ old('thumbnail', asset('storage/' .
                $apartment->thumbnail)) }}" alt="{{ old('title', $apartment?->title) }}">
            @endif
            <div class="w-100">
                <label class="form-label fw-bold">Immagine:</label>
                <input type="file" accept="image/*" name="thumbnail"
                    class="form-control @error('thumbnail') is-invalid @enderror">
                @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- services --}}
        <div class="accordion accordion-flush pt-3 pb-3" id="accordionServices">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold ps-1" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Seleziona i servizi che offre l'appartamento
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionServices">
                    <div class="accordion-body">
                        <div class="form-group">
                            <div class="d-flex flex-wrap">
                                @foreach ($services as $service)
                                <div class="form-check m-1">
                                    <input class="form-check-input" type="checkbox" id="service{{ $service->id }}"
                                        name="services[]" value="{{ $service->id }}"
                                        {{$apartment?->services->contains($service) || in_array($service->id,
                                    old('services', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="service{{ $service->id }}">{{
                                        $service->title}}</label>
                                </div>
                                @endforeach
                                @error('services')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- visibility hidden --}}
        <input type="hidden" name="visibility" value="0">
        {{-- visibility checkbox --}}
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="visibility" value="1" id="apartmentVisibilityCheck" {{
                old('visibility', $apartment?->visibility) ? 'checked' : '' }}>
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
    </div>
</form>