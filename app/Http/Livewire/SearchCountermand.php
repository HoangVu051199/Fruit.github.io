<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchCountermand extends Component
{
    use WithPagination;
    public $searchTerm;
    public $cunrrentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $countermand = Order::where('customer_name', 'LIKE', $searchTerm)
            ->orWhere('customer_email', 'LIKE', $searchTerm)
            ->orWhere('customer_phone', 'LIKE', $searchTerm)
            ->orWhere('customer_address', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(15);

        return view('livewire.search-countermand',[
            'countermand' => $countermand
        ]);
    }

    public function setPage($url)
    {
        $this->cunrrentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function () {
            return $this->cunrrentPage;
        });
    }
}
