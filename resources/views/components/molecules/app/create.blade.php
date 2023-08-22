<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span class="fs-5">Create Data {{ $title }}</span>
            <div>
                <a href="{{ route($route . '.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <x-molecules.form action="{{ route($route . '.store') }}">
            {{ $slot }}

            <button type="submit" class="btn btn-success">Simpan</button>
        </x-molecules.form>
    </div>
</div>
