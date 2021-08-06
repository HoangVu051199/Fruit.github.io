<?php

namespace App\Http\Livewire;

use App\Models\Cate_New;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchCateNew extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $cate_new = Cate_New::where('name', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(1);
        return view('livewire.search-cate-new',[
            'cate_new' => $cate_new
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
