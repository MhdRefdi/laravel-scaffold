<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <span class="fs-5">Listing Data {{ $title }}</span>
            <div>
                {{ $buttons ?? '' }}
                <a href="{{ route($route . '.create') }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $card_body ?? '' }}

        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        @foreach ($rows as $row)
                            <th scope="col">{{ $row }}</th>
                        @endforeach
                        <th scope="col" style="width: 180px;"></th>
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>
