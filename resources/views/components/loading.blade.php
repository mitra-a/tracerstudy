@teleport('#loading-layout')
<div wire:loading.delay>
    <div
        class="alert mb-0 bg-primary d-flex align-items-center position-fixed bottom-0 left-0 right-0 w-100 rounded-0 text-white justify-content-center" style="z-index: 2048">
        <div class="spinner-border text-white me-3" role="status">
            <span class="visually-hidden">Loading...</span>
        </div> 
        Sedang Memuat ...
    </div>
</div>
@endteleport
