<div class="min-h-screen flex flex-col sm:justify-center align-items-end pt-6 w-104 sm:pt-0 ">
    <style>
        .min-h-screen{
            width: 103%;
        }

    </style>
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md bg-white px-6 py-4">
        {{ $slot }}
    </div>
</div>
