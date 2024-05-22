<?php

namespace App\Livewire;

use App\Models\Car;
use Exception;
use Livewire\Component;

class EditCar extends Component
{

    public $is_flash_showing = false;

    public Car $car_data;

    public
        $car_name,
        $brand,
        $fuel_type,
        $capacity;



    public function mount($id)
    {
        $this->car_data = Car::where('id', $id)->first();

        $this->car_name = $this->car_data->car_name;
        $this->brand = $this->car_data->brand;
        $this->fuel_type = $this->car_data->fuel_type;
        $this->capacity = $this->car_data->engine_capacity;
    }

    public function update()
    {
        $this->validate([
            'car_name' => 'required',
            'brand' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',
        ]);

        try {
            Car::where('id', $this->car_data->id)->update([
                
                'car_name' => $this->car_name,
                'brand' => $this->brand,
                'fuel_type' => $this->fuel_type,
                'engine_capacity' => $this->capacity,
            ]);

        $this->is_flash_showing = true;

        return $this->redirect('/cars', navigate:true );
        } catch (Exception $e) {
            $e->getMessage();
        }
    }


    public function render()
    {
        return view('livewire.edit-car');
    }
}
