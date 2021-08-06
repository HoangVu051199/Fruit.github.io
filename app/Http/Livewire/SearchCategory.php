<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchCategory extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $category = Category::where('name', 'like', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(5);
        return view('livewire.search-category', [
            'category' => $category
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
