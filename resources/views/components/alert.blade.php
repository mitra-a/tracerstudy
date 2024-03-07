@if(session()->has('message'))
<div class="alert alert-dismissible bg-white border-{{ session('message')['color'] }} border" role="alert">
    <div class="d-flex">
      <div>
        <h6 class="mb-0 text-{{ session('message')['color'] }}">{{ session('message')['title'] }}</h6>
        <p class="mb-0">{{ session('message')['sub-title'] }}</p>
      </div>
    </div>

    <a class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></a>
</div>
@endif