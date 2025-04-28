<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exhibition;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class ExhibitionList extends Component
{
    use WithPagination;
    public $city = '';
    public $category = '';
    public $sortDate = 'asc';

    public function setCity($city)
    {
        $this->city = $city;
        $this->resetPage();
    }

    public function setCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }


    public function setSortDate($sort)
    {
        $this->sortDate = $sort;
        $this->resetPage();
    }

    public function render()
    {
        $query = Exhibition::query()->where('status', '!=', 'draft');;

        if ($this->city) {
            $query->where('city', $this->city);
        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        $query->orderBy('start_date', $this->sortDate);

        $cities = Exhibition::query()->groupBy('city')->orderBy('city', 'asc')->select('city')->get();
        $categories = Exhibition::query()->groupBy('category')->orderBy('category', 'asc')->select('category')->get();

        return view('livewire.exhibition-list', [
            'exhibitions' => $query->paginate(6),
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }
}
