<div {{ $attributes->merge(['class' => 'max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md']) }}>
    <form action="{{ $action }}" method="{{ $method }}" class="space-y-6">
        @csrf
        @if($method !== 'GET')
            @method($method)
        @endif

        {{ $slot }}

        <div class="flex items-center justify-end space-x-4">
            {{ $buttons }}
        </div>
    </form>
</div>
