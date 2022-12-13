<span {{ $attributes->class(['shadow-sm mx-1 bg-white text-gray-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded cursor-pointer']) }}>
	{{$slot}}
	
	@if(isset($type) && $type == 'dismissible')
		<button type="button" wire:click="addFilter()" class="inline-flex items-center align-text-top p-0.5 ml-0.5 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-300 dark:hover:text-gray-900">
    <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
    </svg>
</button>
	@endif
</span>
