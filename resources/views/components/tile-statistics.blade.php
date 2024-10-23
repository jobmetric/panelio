<div class="card h-lg-100">
    <div class="card-body d-flex justify-content-between align-items-start flex-column">
        <div class="m-0">
            {{ $slot }}
        </div>
        <div class="d-flex flex-column my-2">
            <span class="fw-semibold fs-3x text-gray-800 lh-3 ls-n2">{{ $number_format }}</span>
            <div class="m-0">
                <span class="fw-semibold fs-6 text-gray-400">{{ $name }}</span>
            </div>
        </div>
    </div>
</div>
