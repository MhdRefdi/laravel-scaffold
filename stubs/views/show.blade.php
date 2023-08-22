<x-templates.app title="Show  {{ model }}">
    <x-molecules.app.show title="{{ model }}" route="backend.{{ variable }}" :id="${{ variable }}->id">
        {{-- <div class="col-md-4">
            <span class="fw-bold d-block">Example</span>
            <span>Example</span>
        </div> --}}
    </x-molecules.app.show>
</x-templates.app>
