@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header section -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">
                            <i class="fa-solid fa-cloud-arrow-up text-primary me-2"></i>Tambah Foto Galeri
                        </h4>
                        <p class="text-muted small mb-0">Unggah foto kegiatan baru untuk dipublikasikan pada portal sekolah.</p>
                    </div>
                    <a href="{{ route('admin.galleries.index') }}"
                        class="btn btn-outline-secondary btn-sm rounded-pill px-3 transition-all">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                        <div class="d-flex align-items-center gap-2 fw-semibold mb-2">
                            <i class="fa-solid fa-circle-exclamation fs-5"></i> Terjadi Kesalahan Input:
                        </div>
                        <ul class="mb-0 ps-3 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Card -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">Judul Foto / Kegiatan <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-lg rounded-3 fs-6"
                                placeholder="Contoh: Kegiatan Upacara Bendera HUT RI" value="{{ old('title') }}" required>
                        </div>

                        <!-- Drag & Drop Upload Zone + Preview -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">File Gambar <span class="text-danger">*</span></label>

                            <div class="upload-dropzone border border-2 border-dashed rounded-4 p-4 text-center bg-light position-relative transition-all" id="dropzone">

                                <!-- Hidden File Input -->
                                <input type="file" name="image" id="imageInput"
                                    class="position-absolute top-0 start-0 w-100 h-100 opacity-0 cursor-pointer"
                                    accept="image/jpeg,image/png,image/webp" required>

                                <!-- State 1: Prompt Upload -->
                                <div id="uploadPrompt" class="py-3 pointer-events-none">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa-solid fa-cloud-arrow-up fs-3"></i>
                                    </div>
                                    <h6 class="fw-bold text-dark mb-1">Klik atau Tarik File Gambar Ke Sini</h6>
                                    <p class="text-muted small mb-0">Format yang didukung: JPG, PNG, WEBP (Maksimal 2MB)</p>
                                </div>

                                <!-- State 2: Interactive Live Preview -->
                                <div id="previewContainer" class="d-none position-relative z-2">
                                    <img id="imagePreview" src="#" alt="Preview"
                                        class="img-fluid rounded-3 shadow-sm border"
                                        style="max-height: 250px; object-fit: contain;">
                                    <div class="mt-2 text-muted small fw-semibold" id="fileDetails"></div>

                                    <button type="button" id="removeImageBtn"
                                        class="btn btn-sm btn-danger rounded-pill px-3 mt-2">
                                        <i class="fa-solid fa-rotate me-1"></i> Ganti Gambar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">Keterangan / Deskripsi</label>
                            <textarea name="description" class="form-control rounded-3" rows="4"
                                placeholder="Tulis deskripsi atau catatan singkat mengenai foto ini...">{{ old('description') }}</textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-2 pt-2">
                            <a href="{{ route('admin.galleries.index') }}"
                                class="btn btn-light border rounded-pill px-4 fw-semibold">Batal</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                                <i class="fa-solid fa-check me-1"></i> Simpan & Unggah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const uploadPrompt = document.getElementById('uploadPrompt');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const fileDetails = document.getElementById('fileDetails');
        const removeImageBtn = document.getElementById('removeImageBtn');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    fileDetails.textContent = `${file.name} (${(file.size / (1024 * 1024)).toFixed(2)} MB)`;

                    // Sembunyikan Prompt & Input Layer agar tidak menutupi tombol Ganti Gambar
                    uploadPrompt.classList.add('d-none');
                    imageInput.classList.add('d-none');
                    previewContainer.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });

        removeImageBtn.addEventListener('click', function() {
            imageInput.value = '';

            // Kembalikan ke tampilan awal & panggil dialog file browser
            uploadPrompt.classList.remove('d-none');
            imageInput.classList.remove('d-none');
            previewContainer.classList.add('d-none');

            imageInput.click();
        });
    </script>

    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        .border-dashed {
            border-style: dashed !important;
        }

        .upload-dropzone:hover {
            background-color: #f1f5f9 !important;
            border-color: #3b82f6 !important;
        }

        .pointer-events-none {
            pointer-events: none;
        }

        .z-2 {
            z-index: 2;
        }
    </style>
@endsection
