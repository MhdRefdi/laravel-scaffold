@php
    $invalid_class = $errors->has($props) ? 'is-invalid' : '';
@endphp

@if ($type == 'text')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="{{ $props }}"
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props, 'placeholder' => 'Masukkan ' . $label, 'value' => old($props)]) }}>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if ($type == 'email')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="email" id="{{ $props }}"
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props, 'placeholder' => 'Masukkan ' . $label, 'value' => old($props)]) }}>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if ($type == 'password')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="password" id="{{ $props }}"
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props, 'placeholder' => 'Masukkan ' . $label, 'value' => old($props)]) }}>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if ($type == 'file')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="file" id="{{ $props }}"
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props, 'placeholder' => 'Masukkan ' . $label, 'value' => old($props)]) }}>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if ($type == 'textarea')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <textarea
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props, 'placeholder' => 'Masukkan ' . $label]) }}
            id="{{ $props }}" cols="30" rows="10">{{ old($props) }}</textarea>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if ($type == 'date')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="date" id="{{ $props }}"
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props, 'placeholder' => 'Masukkan ' . $label, 'value' => old($props)]) }}>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if ($type == 'select')
    <div class="mb-3">
        <label for="{{ $props }}">{{ $label }}
            @if ($attributes['required'])
                <span class="text-danger">*</span>
            @endif
        </label>
        <select id="{{ $props }}"
            {{ $attributes->merge(['class' => 'form-control ' . $invalid_class, 'name' => $props]) }}>
            <option value="" hidden>{{ $attributes['placeholder'] ?? "Pilih $label" }}</option>
            {{ $slot }}
        </select>
        @error($props)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
