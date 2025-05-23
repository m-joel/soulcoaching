<x-base-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{ isset($product) ? 'Produkt bearbeiten' : 'Produkt erstellen' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-5">
                            <label for="name" class="required form-label">Produktname</label>
                            <input type="text"
                                class="form-control form-control-solid @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="description" class="form-label">Beschreibung</label>
                            <textarea class="form-control form-control-solid @error('description') is-invalid @enderror" id="description"
                                name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="price" class="required form-label">Preis (CHF)</label>
                                    <input type="number" step="0.01"
                                        class="form-control form-control-solid @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $product->price ?? '') }}"
                                        required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="compare_price" class="form-label">Vergleichspreis (CHF)</label>
                                    <input type="number" step="0.01"
                                        class="form-control form-control-solid @error('compare_price') is-invalid @enderror"
                                        id="compare_price" name="compare_price"
                                        value="{{ old('compare_price', $product->compare_price ?? '') }}">
                                    @error('compare_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="quantity" class="required form-label">Menge</label>
                                    <input type="number"
                                        class="form-control form-control-solid @error('quantity') is-invalid @enderror"
                                        id="quantity" name="quantity"
                                        value="{{ old('quantity', $product->quantity ?? '') }}" required>
                                    @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text"
                                        class="form-control form-control-solid @error('sku') is-invalid @enderror"
                                        id="sku" name="sku" value="{{ old('sku', $product->sku ?? '') }}">
                                    @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text"
                                class="form-control form-control-solid @error('barcode') is-invalid @enderror"
                                id="barcode" name="barcode" value="{{ old('barcode', $product->barcode ?? '') }}">
                            @error('barcode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-5">
                            <label for="image" class="form-label">Hauptbild</label>
                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ isset($product) && $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                                </div>
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Bild ändern">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="image_remove" />
                                </label>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    title="Bild abbrechen">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    title="Bild entfernen">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="images" class="form-label">Zusätzliche Bilder</label>
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <div class="dz-message needsclick">
                                    <i class="ki-duotone ki-file-up fs-3hx text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Dateien hier ablegen oder zum Hochladen klicken.</h3>
                                        <span class="fs-7 fw-semibold text-gray-400">Bis zu 10 Dateien hochladen</span>
                                    </div>
                                </div>
                            </div>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured"
                                    value="1"
                                    {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }} />
                                <label class="form-check-label" for="is_featured">Hervorgehobenes Produkt</label>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                    value="1"
                                    {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }} />
                                <label class="form-check-label" for="is_active">Aktiv</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light me-3">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($product) ? 'Produkt aktualisieren' : 'Produkt erstellen' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-base-layout>

<script>
    // Initialize image input
    var imageInputElement = document.querySelector("[data-kt-image-input='true']");
    if (imageInputElement) {
        var imageInput = new KTImageInput(imageInputElement);
    }

    // Initialize dropzone
    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: "{{ route('admin.products.store') }}",
        paramName: "images",
        maxFiles: 10,
        maxFilesize: 2,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 10,
        dictDefaultMessage: "Dateien hier ablegen oder zum Hochladen klicken",
        dictRemoveFile: "Datei entfernen",
        dictInvalidFileType: "Sie können keine Dateien dieses Typs hochladen.",
        dictMaxFilesExceeded: "Sie können keine weiteren Dateien hochladen.",
        dictCancelUpload: "Hochladen abbrechen",
        dictUploadCanceled: "Hochladen abgebrochen.",
        dictCancelUploadConfirmation: "Sind Sie sicher, dass Sie diesen Upload abbrechen möchten?",
        dictRemoveFileConfirmation: "Sind Sie sicher, dass Sie diese Datei entfernen möchten?",
        dictMaxFilesExceeded: "Sie können keine weiteren Dateien hochladen.",
        init: function() {
            this.on("addedfile", function(file) {
                console.log("Datei hinzugefügt: " + file.name);
            });
            this.on("removedfile", function(file) {
                console.log("Datei entfernt: " + file.name);
            });
        }
    });
</script>
