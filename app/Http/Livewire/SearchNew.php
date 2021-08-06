<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchNew extends Component
{
    use WithPagination;
    public $searchTerm;
    public $cunrrentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $new = News::where('title', 'LIKE', $searchTerm)
            ->orWhere('content', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(1);

        return view('livewire.search-new',[
            'new' => $new
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
