<?php

namespace App\Http\Livewire\Transaction;

use App\Helper\WithData;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithData;
    use WithPagination;    
    protected $paginationTheme = 'bootstrap';
    public $column = '10', $search, $transaction_id;

    
    public function render()
    {
        $transactions = Transaction::where('user_id',Auth::user()->id)
                        ->where('name', 'like', '%' . $this->search . '%')
                        ->latest()->paginate($this->column);
        return view('livewire.transaction.all',compact('transactions'));
    }
}
