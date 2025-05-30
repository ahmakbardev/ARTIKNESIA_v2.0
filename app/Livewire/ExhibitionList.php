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
    public int $categoryLimit = 5;

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

    public function seeMoreCategory()
    {
        $this->categoryLimit += 5;
    }

    public function setSortDate($sort)
    {
        $this->sortDate = $sort;
        $this->resetPage();
    }

    public function render()
    {
        $query = Exhibition::query()->where('status', '!=', 'draft');

        if ($this->city) {
            $query->where('city', $this->city);
        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        $query->orderBy('start_date', $this->sortDate);

        // $cities = Exhibition::query()->groupBy('city')->orderBy('city', 'asc')->select('city')->limit(4)->get();
        $cities = Exhibition::query()->groupBy('city')->orderBy('city', 'asc')->select('city')->get();
        $categoryCount = Exhibition::query()->select('category')->groupBy('category')->orderBy('category', 'asc')->get()->count();
        $categories = Exhibition::query()->groupBy('category')->orderBy('category', 'asc')->select('category')->limit($this->categoryLimit)->get();
  
        return view('livewire.exhibition-list', [
            'exhibitions' => $query->paginate(8),
            'cities' => $cities,
            'categories' => $categories,
            'categoryCount' => $categoryCount
        ]);
    }
}
