<?php

namespace App\Livewire;

use App\Models\Car;
use Exception;
use Livewire\Component;

use function Laravel\Prompts\alert;

class CarList extends Component
{

    public $all_cars, $search;


    public function delete($id)
    {
        try {
            Car::where('id', $id)->delete();
            return $this->redirect('/cars', navigate: true);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function render()
    {

        $this->search = str_replace(array(' ',',','.'),'' ,$this->search);

        if (!empty($this->search) || !is_null($this->search)) {
            $this->all_cars = Car::where(function ($q) {
                $q->where('car_name', 'like', '%' . $this->search . '%')
                    ->orWhere('brand', 'like', '%' . $this->search . '%')
                    ->orWhere('fuel_type', 'like', '%' . $this->search . '%')
                    ->orWhere('engine_capacity', 'like', '%' . $this->search . '%');
            })->get();
        } else {
            $this->all_cars = Car::all();
        }

        return view('livewire.car-list', [
            'cars' => $this->all_cars
        ]);
    }
}
