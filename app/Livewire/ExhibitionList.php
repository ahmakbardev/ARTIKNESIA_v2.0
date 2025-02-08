<?php

namespace App\Livewire;

use App\Models\Exhibition;
use Livewire\Component;
use Livewire\WithPagination;

class ExhibitionList extends Component
{
    use WithPagination;

    public $city = '';

    public function setCity($city)
    {
        $this->city = $city;
        $this->resetPage();
    }

    public function render()
    {
        $query = Exhibition::query();

        if ($this->city) {
            $query->where('city', $this->city);
        }

        $query->orderBy('created_at', 'desc');

        $cities = Exhibition::query()->groupBy('city')->orderBy('city', 'asc')->select('city')->get();

        return view('livewire.exhibition-list', [
            'exhibitions' => $query->paginate(6),
            'cities' => $cities
        ]);
    }
}
