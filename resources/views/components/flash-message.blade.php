@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-1 left-1/2 transform -translate-x-1/2 rounded bg-laravel text-white py-3">
        <p class="mx-4">
            {{ session('message') }}
        </p>
    </div>
@endif