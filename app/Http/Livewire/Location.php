<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Location extends Component
{
    public string $provinceId = '';

    public $districts = [];
    public string $districtId = '';

    public $wards = [];

    public string $wardId = '';

    public $firstName;
    public $lastName;
    public $email;
    public $phoneNumber;
    public $address;
    public $phone;

    public function addNew(): void
    {
        Address::create([
            'user_id' => Auth::user()->id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'province_id' => $this->provinceId,
            'district_id' => $this->districtId,
            'ward_id' => $this->wardId,
        ]);

        $this->reset();
    }

    public function render(): View
    {
        $provinces = Province::all();

        if (!empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }
        if (!empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        $addresses = Address::where('user_id', Auth::user()->id)->get();

        return view('livewire.location', [
            'provinces' => $provinces,
            'addresses' => $addresses,
        ]);
    }
}
