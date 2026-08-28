@extends('layouts.app')

@section('title', 'CCS Student Portal — Register')

@section('content')

<div class="mb-8 text-center">
    <div class="inline-block bg-brand-100 text-brand-700 text-xs font-semibold px-3 py-1 rounded-full mb-3">
        College of Computer Studies
    </div>
    <h1 class="font-heading text-3xl md:text-4xl font-bold text-slate-800">Student Registration</h1>
    <p class="text-slate-500 mt-2">Join the CCS family — fill out your details below.</p>
</div>

@if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
        <strong class="block mb-1 font-heading">⚠️ Please fix the following:</strong>
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- FORM --}}
    <div class="lg:col-span-2 bg-white/90 backdrop-blur shadow-lg shadow-brand-900/5 border border-slate-150 rounded-2xl p-8">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data"
              id="regForm" class="space-y-8" novalidate>
            @csrf

            {{-- SECTION: Personal Info --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-7 h-7 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center text-sm">👤</span>
                    <h2 class="font-heading font-semibold text-slate-700">Personal Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Student ID <span class="text-red-500">*</span></label>
                        <input type="text" name="student_id" data-required
                            value="{{ old('student_id') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">This field is required.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Gender <span class="text-red-500">*</span></label>
                        <select name="gender" data-required
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                            <option value="">-- Select --</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <p class="field-error text-xs text-red-500 mt-1 hidden">Please select an option.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">First Name <span class="text-red-500">*</span></label>
                        <input type="text" name="first_name" data-required data-preview="first_name"
                            value="{{ old('first_name') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">This field is required.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Middle Name</label>
                        <input type="text" name="middle_name" data-preview="middle_name"
                            value="{{ old('middle_name') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Last Name <span class="text-red-500">*</span></label>
                        <input type="text" name="last_name" data-required data-preview="last_name"
                            value="{{ old('last_name') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">This field is required.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                        <input type="date" name="date_of_birth" data-required
                            value="{{ old('date_of_birth') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">This field is required.</p>
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            {{-- SECTION: Contact Info --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-7 h-7 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center text-sm">📞</span>
                    <h2 class="font-heading font-semibold text-slate-700">Contact Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" data-required data-email
                            value="{{ old('email') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">Enter a valid email address.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Mobile Number <span class="text-red-500">*</span></label>
                        <input type="text" name="mobile_number" data-required data-numeric
                            value="{{ old('mobile_number') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">Numbers only.</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 mb-1">Address <span class="text-red-500">*</span></label>
                        <textarea name="address" rows="2" data-required
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">{{ old('address') }}</textarea>
                        <p class="field-error text-xs text-red-500 mt-1 hidden">This field is required.</p>
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            {{-- SECTION: Academic Info --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-7 h-7 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center text-sm">🎓</span>
                    <h2 class="font-heading font-semibold text-slate-700">Academic Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Program <span class="text-red-500">*</span></label>
                        <input type="text" name="program" data-required data-preview="program"
                            placeholder="e.g. BS Information Technology"
                            value="{{ old('program') }}"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                        <p class="field-error text-xs text-red-500 mt-1 hidden">This field is required.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Year Level <span class="text-red-500">*</span></label>
                        <select name="year_level" data-required data-preview="year_level"
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition">
                            <option value="">-- Select --</option>
                            <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                        </select>
                        <p class="field-error text-xs text-red-500 mt-1 hidden">Please select an option.</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 mb-1">Profile Picture <span class="text-red-500">*</span></label>
                        <input type="file" name="profile_picture" accept="image/*" id="pictureInput" data-required
                            class="field-input w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-brand-400 focus:border-brand-400 outline-none transition file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-brand-100 file:text-brand-700 file:text-sm">
                        <p class="text-xs text-slate-400 mt-1">JPG or PNG only, max 2MB.</p>
                        <p class="field-error text-xs text-red-500 mt-1 hidden">Please upload a profile picture.</p>
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full md:w-auto bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 text-white font-medium px-8 py-3 rounded-xl transition shadow-md shadow-brand-600/20">
                    Register Student →
                </button>
            </div>
        </form>
    </div>

    {{-- LIVE PREVIEW --}}
    <div class="bg-white/90 backdrop-blur shadow-lg shadow-brand-900/5 border border-slate-150 rounded-2xl p-6 h-fit sticky top-24">
        <p class="text-xs uppercase tracking-wide text-brand-600 font-semibold mb-5 text-center">Student ID Card Preview</p>

        <div class="bg-gradient-to-br from-brand-600 to-brand-800 rounded-2xl p-5 text-white shadow-lg">
            <div class="flex flex-col items-center text-center">
                <div id="previewImgWrap" class="w-24 h-24 rounded-full border-4 border-white/30 mb-3 bg-white/10 flex items-center justify-center overflow-hidden">
                    <span id="previewIcon" class="text-3xl">📷</span>
                    <img id="previewImg" class="w-full h-full object-cover hidden">
                </div>
                <p id="previewName" class="font-heading font-semibold">Full Name</p>
                <p id="previewProgram" class="text-xs text-brand-100 mt-1">Program · Year Level</p>
                <div class="w-full border-t border-white/20 mt-4 pt-3">
                    <p class="text-[10px] text-brand-200 uppercase tracking-wide">CCS Student Portal</p>
                </div>
            </div>
        </div>

        <p class="text-xs text-slate-400 text-center mt-4">This updates live as you fill out the form.</p>
    </div>
</div>

<script>
    const form = document.getElementById('regForm');
    const previewName = document.getElementById('previewName');
    const previewProgram = document.getElementById('previewProgram');
    const previewImg = document.getElementById('previewImg');
    const previewIcon = document.getElementById('previewIcon');

    function updatePreview() {
        const first = form.first_name.value.trim();
        const middle = form.middle_name.value.trim();
        const last = form.last_name.value.trim();
        const fullName = [first, middle, last].filter(Boolean).join(' ');
        previewName.textContent = fullName || 'Full Name';

        const program = form.program.value.trim();
        const year = form.year_level.value.trim();
        previewProgram.textContent = (program || 'Program') + ' · ' + (year || 'Year Level');
    }

    ['first_name', 'middle_name', 'last_name', 'program', 'year_level'].forEach(name => {
        form[name].addEventListener('input', updatePreview);
        form[name].addEventListener('change', updatePreview);
    });

    document.getElementById('pictureInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            previewImg.src = URL.createObjectURL(file);
            previewImg.classList.remove('hidden');
            previewIcon.classList.add('hidden');
        }
    });

    function showError(field, show) {
        const errorEl = field.parentElement.querySelector('.field-error');
        if (show) {
            field.classList.add('border-red-400', 'ring-1', 'ring-red-300');
            field.classList.remove('border-slate-200');
            if (errorEl) errorEl.classList.remove('hidden');
        } else {
            field.classList.remove('border-red-400', 'ring-1', 'ring-red-300');
            field.classList.add('border-slate-200');
            if (errorEl) errorEl.classList.add('hidden');
        }
    }

    function validateField(field) {
        let isValid = true;
        if (field.hasAttribute('data-required')) {
            isValid = field.type === 'file'
                ? (field.files && field.files.length > 0)
                : field.value.trim() !== '';
        }
        if (isValid && field.hasAttribute('data-email')) {
            isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value.trim());
        }
        if (isValid && field.hasAttribute('data-numeric')) {
            isValid = /^[0-9]+$/.test(field.value.trim());
        }
        showError(field, !isValid);
        return isValid;
    }

    form.querySelectorAll('[data-required], [data-email], [data-numeric]').forEach(field => {
        field.addEventListener('blur', () => validateField(field));
        field.addEventListener('input', () => {
            if (field.classList.contains('border-red-400')) validateField(field);
        });
        field.addEventListener('change', () => validateField(field));
    });

    form.addEventListener('submit', function (e) {
        let allValid = true;
        form.querySelectorAll('[data-required], [data-email], [data-numeric]').forEach(field => {
            if (!validateField(field)) allValid = false;
        });
        if (!allValid) {
            e.preventDefault();
            form.querySelector('.border-red-400')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
@endsection