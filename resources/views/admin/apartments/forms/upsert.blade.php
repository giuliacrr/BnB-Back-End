<div class="apartament-form-box">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf()
        @method($method)

        {{-- title --}}
        <label class="form-label fw-bold">Titolo:</label>
        <input type="text" name="title" value="{{ old('title', $apartment?->title) }}"
            class="mb-3 form-control @error('title') is-invalid @enderror" required placeholder="*">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                {{-- rooms number --}}
                <label class="form-label fw-bold">Numero di stanze:</label>
                <input type="number" min="1" name="rooms_number" id="rooms_number"
                    value="{{ old('rooms_number', $apartment?->rooms_number) }}"
                    class="mb-3 form-control @error('rooms_number') is-invalid @enderror"
                    oninput="checkLength('rooms_number')" required placeholder="*">
                @error('rooms_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                {{-- beds number --}}
                <label class="form-label fw-bold">Numero di letti:</label>
                <input type="number" min="1" name="beds_number" id="beds_number"
                    value="{{ old('beds_number', $apartment?->beds_number) }}"
                    class="mb-3 form-control @error('beds_number') is-invalid @enderror" oninput="checkLength('beds_number')"
                    required placeholder="*">
                @error('beds_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                {{-- bathrooms number --}}
                <label class="form-label fw-bold">Numero di bagni:</label>
                <input type="number" min="1" name="bathrooms_number" id="bathrooms_number"
                    value="{{ old('bathrooms_number', $apartment?->bathrooms_number) }}"
                    class="mb-3 form-control @error('bathrooms_number') is-invalid @enderror"
                    oninput="checkLength('bathrooms_number')" required placeholder="*">
                @error('bathrooms_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                {{-- square meters --}}
                <label class="form-label fw-bold">Grandezza casa:</label>
                <input type="number" min="1" name="square_meters" id="square_meters"
                    value="{{ old('square_meters', $apartment?->square_meters) }}"
                    class="mb-3 form-control @error('square_meters') is-invalid @enderror"
                    oninput="checkLength('square_meters')" required placeholder="*">
                @error('square_meters')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col">
            {{-- address --}}
            <label class="form-label fw-bold">Indirizzo:</label>
            <input type="text" name="address" value="{{ old('address', $apartment?->address) }}"
                class="form-control @error('address') is-invalid @enderror" required placeholder="*">
            <div class="position-relative" style="z-index: 999">
                <ul id="address-suggestions" class="list-group position-absolute w-100 overflow-auto"
                    style="max-height: 250px"></ul>
            </div>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            {{-- thumbnail --}}
            <div class="d-flex align-items-center mt-2">
                @if ($apartment?->thumbnail)
                    <img class="img-apartment-form"
                        src="{{ old('thumbnail', asset('storage/' . $apartment->thumbnail)) }}"
                        alt="{{ old('title', $apartment?->title) }}">
                @endif
                <div class="w-100">
                    <label class="form-label fw-bold">Immagine:</label>
                    <input type="file" accept="image/*" name="thumbnail"
                        class="form-control fw-normal @error('thumbnail') is-invalid @enderror">
                    @error('thumbnail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- services --}}
            <div class="accordion accordion-flush pt-4 pb-4" id="accordionServices">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Seleziona i servizi che offre l'appartamento
                        </button>
                    </h2>
                    @error('services')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionServices">
                        <div class="accordion-body">
                            <div class="form-group">
                                <div class="row row-cols-1 row-cols-md-2 gy-2">
                                    @foreach ($services as $service)
                                        <div class="col">
                                            <div class="checkbox-wrapper">
                                                <input class="form-check-input" type="checkbox"
                                                    id="service{{ $service->id }}" name="services[]"
                                                    value="{{ $service->id }}"
                                                    {{ $apartment?->services->contains($service) || in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                                <label class="terms-label" for="service{{ $service->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 200 200" class="checkbox-svg">
                                                        <mask fill="white" id="path-1-inside-1_476_5-37">
                                                            <rect height="200" width="200"></rect>
                                                        </mask>
                                                        <rect mask="url(#path-1-inside-1_476_5-37)" stroke-width="40"
                                                            class="checkbox-box" height="200" width="200">
                                                        </rect>
                                                        <path stroke-width="15" d="M52 111.018L76.9867 136L149 64"
                                                            class="checkbox-tick"></path>
                                                    </svg>
                                                    <span class="label-text">{{ $service->title }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- visibility hidden --}}
            <input type="hidden" name="visibility" value="0">
            {{-- visibility checkbox --}}
            <div class="checkbox-wrapper">
                <input class="form-check-input" type="checkbox" id="apartmentVisibilityCheck" name="visibility"
                    value="1" {{ old('visibility', $apartment?->visibility) ? 'checked' : '' }}>
                <label class="terms-label" for="apartmentVisibilityCheck">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200"
                        class="checkbox-svg">
                        <mask fill="white" id="path-1-inside-1_476_5-37">
                            <rect height="200" width="200"></rect>
                        </mask>
                        <rect mask="url(#path-1-inside-1_476_5-37)" stroke-width="40" class="checkbox-box"
                            height="200" width="200">
                        </rect>
                        <path stroke-width="15" d="M52 111.018L76.9867 136L149 64" class="checkbox-tick"></path>
                    </svg>
                    <span class="label-text label-publish">Pubblicato</span>
                </label>
                @error('visibility')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- button --}}
            <button type="submit" class="btn btn-primary me-1 mt-4">Salva</button>
            <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary mt-4">Annulla</a>
        </div>
    </form>

    @if ($apartment?->slug)
        <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-primary">
                <i class="fa-regular fa-trash-can"></i>
            </button>
        </form>
    @endif
</div>

<script src="{{ asset('js/check-length.js') }}"></script>
<script src="{{ asset('js/tomtom-suggestions.js') }}"></script>
