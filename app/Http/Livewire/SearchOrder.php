<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class SearchOrder extends Component
{
    use WithPagination;
    public $searchTerm;
    public $cunrrentPage = 1;

    public function render()
    {
        $searchTerm = '%'. $this->searchTerm .'%';
        $order = Order::where('customer_name', 'LIKE', $searchTerm)
            ->orWhere('customer_email', 'LIKE', $searchTerm)
            ->orWhere('customer_phone', 'LIKE', $searchTerm)
            ->orWhere('customer_address', 'LIKE', $searchTerm)
            ->orderBy('id', 'ASC')->paginate(15);

        return view('livewire.search-order',[
            'order' => $order
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
