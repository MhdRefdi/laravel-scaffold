<x-templates.app title="Create {{ model }}">
    <x-molecules.app.create title="{{ model }}" route="backend.{{ variable }}">
        {{-- <x-atoms.input props="example" label="example" value="{{ old('example', ${{ variable }}->name) }}" /> --}}
    </x-molecules.app.create>
</x-templates.app>
