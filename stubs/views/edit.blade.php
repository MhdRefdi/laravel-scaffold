<x-templates.app title="Update {{ model }}">
    <x-molecules.app.edit title="{{ model }}" route="backend.{{ variable }}" :id="${{ variable }}->id">
        {{-- <x-atoms.input props="example" label="example" value="{{ old('example', ${{ variable }}->name) }}" /> --}}
    </x-molecules.app.edit>
</x-templates.app>
