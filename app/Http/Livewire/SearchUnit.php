<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchUnit extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $unit = Unit::where('name', 'LIKE', $searchTerm)
            ->orWhere('description', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(5);

        return view('livewire.search-unit',[
            'unit' => $unit
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
