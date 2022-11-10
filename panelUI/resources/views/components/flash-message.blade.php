@if (session()->has('successMessage'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-success position-absolute text-center" style="z-index: 2000; top: 10px; left: 25%; width: 40%;" role="alert">
        {{ session('successMessage') }}
    </div>
@elseif (session()->has('errorMessage'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-danger position-absolute text-center" style="z-index: 2000; top: 10px; left: 25%; width: 40%;" role="alert">
        {{ session('errorMessage') }}
    </div>
@endif

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
