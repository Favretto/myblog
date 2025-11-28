<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Esito Riconoscimento ...') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Autenticazione avvenuta!
                </div>
            </div>
		<br/>					
			<a href="{{ route('landingpage') }}" aria-label="Vai alla home" style="display:inline-flex; align-items:center; text-decoration:none;">
				<svg fill="none" stroke="navy" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					 viewBox="0 0 24 24" width="24" height="24" style="margin-right:6px;">
					<circle cx="12" cy="12" r="10" />
					<path d="M14 12H10" />         <!-- linea orizzontale -->
					<path d="M12 10l-2 2 2 2" />    <!-- punta della freccia -->
				</svg>
				<span style="color:navy; font-weight:bold;">Indietro</span>
			</a>
        </div>
    </div>
</x-app-layout>
