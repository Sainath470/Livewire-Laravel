<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col">
          <h2>Laravel 10 + livewire 3 CRUD</h2>
        </div>
        <div class="col">
          <a href="/add/new" wire:navigate class="btn btn-success btn-sm float-end">
            Add New
          </a>
        </div>
      </div>
      {{-- @livewireScripts --}}
      <div class="input-group mt-3 mb-2">
        <div class="form-outline">
          <input wire:model.live.debounce.300ms="search" type="search" id="form1" class="form-control" placeholder="search..." />
        </div>
        <button type="button" class="btn @disabled(true) btn-primary btn-sm">
          <i class="bi bi-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-search" viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg></i>
        </button>
      </div>

    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">RNo.</th>
            <th scope="col">Car Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Engine Capacity</th>
            <th scope="col">Fuel Type</th>
            <th colspan="2" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_cars as $car_item)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td wire:key='{{ $car_item->car_name}}'>{{ $car_item->car_name}}</td>
            <td>{{ $car_item->brand}}</td>
            <td>{{ $car_item->engine_capacity}}</td>
            <td>{{ $car_item->fuel_type}}</td>
            <div class="row">
              <td><a href="/edit/car/{{$car_item->id}}" wire:navigate class="btn btn-primary btn-sm float-end">Edit</a>
              </td>
              <td><button class="btn btn-danger btn-sm" wire:click="delete({{$car_item->id}})"
                  wire:confirm="Are you sure you want to delete this?">
                  Delete</button></td>
            </div>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</div>