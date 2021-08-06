<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchProduct extends Component
{
    use WithPagination;
    public $searchTerm;
    public $cunrrentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $product = Product::where('name', 'LIKE', $searchTerm)
            ->orWhere('price', 'LIKE', $searchTerm)
            ->orWhere('origin', 'LIKE', $searchTerm)
            ->orWhere('description', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(15);

        return view('livewire.search-product',[
            'product' => $product
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
