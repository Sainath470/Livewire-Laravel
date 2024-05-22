<?php

namespace App\Livewire;

use App\Models\Car;
use Exception;
use Livewire\Component;

class AddCar extends Component
{

    public
        $car_name,
        $brand,
        $fuel_type,
        $capacity = '';


    public function saveCar()
    {
        $this->validate([
            'car_name' => 'required',
            'brand' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',

        ]);

        try{
            $new_car = new Car;
            $new_car->car_name = $this->car_name;
            $new_car->brand = $this->brand;
            $new_car->fuel_type = $this->fuel_type;
            $new_car->engine_capacity = $this->capacity;
            $new_car->save();
    
            return $this->redirect('/cars', navigate:true);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.add-car');
    }
}
