<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span class="fs-5">Show Data {{ $title }}</span>
            <div>
                <a href="{{ route($route . '.edit', $id) }}" class="btn btn-warning">Ubah</a>
                <a href="{{ route($route . '.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
</div>
