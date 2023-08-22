<td class="text-center">
    @if ($show == true)
        <a @if ($attributes['show_target']) target="{{ $attributes['show_target'] }}" @endif
            href="{{ route($route . '.show', $id) }}" class="btn btn-sm btn-primary">
            <i class="bx bx-show"></i>
        </a>
    @endif
    @if ($edit == true)
        <a href="{{ route($route . '.edit', $id) }}" class="btn btn-sm btn-warning">
            <i class="bx bx-edit"></i>
        </a>
    @endif
    @if ($delete == true)
        <form onclick="return confirm('apakah anda yakin ingin hapus?')" action="{{ route($route . '.destroy', $id) }}"
            method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                <i class="bx bx-trash"></i>
            </button>
        </form>
    @endif
</td>
