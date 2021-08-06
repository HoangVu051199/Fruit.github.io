<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchSlider extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $slider = Slider::where('position', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(10);

        return view('livewire.search-slider',[
            'slider' => $slider
        ]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }
}
