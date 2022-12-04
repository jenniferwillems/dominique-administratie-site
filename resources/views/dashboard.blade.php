<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Dashboard') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			@guest()
				<x-flash-message type="info">Deze website is een persoonlijk archief en is daarom read-only. Log in als administrator om items te beheren.</x-flash-message>
			@endguest
			
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<x-stats></x-stats>
			</div>
		</div>
	</div>
</x-app-layout>
