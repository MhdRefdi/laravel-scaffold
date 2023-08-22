<x-templates.app title="Listing {{ model }}" :datatable="true">
    <x-molecules.app.index title="{{ model }}" route="backend.{{ variable }}" :rows="$rows">
        @foreach (${{ variables }} as ${{ variable }})
            <tr class="align-middle">
                <x-atoms.form.actions route="backend.{{ variable }}" :id="${{ variable }}->id" />
            </tr>
        @endforeach
    </x-molecules.app.index>
</x-templates.app>
