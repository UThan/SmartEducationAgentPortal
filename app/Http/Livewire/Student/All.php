<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;  
    use AuthorizesRequests;  
    protected $paginationTheme = 'bootstrap';
    public $column = '10', $search, $student_id;

    public function render()
    {
        $students = Student::where('name', 'like', '%' . $this->search . '%')
                    ->latest()->paginate($this->column);
        return view('livewire.student.all',compact('students'));
    }    

    public function delete()
    {        
         Student::destroy($this->student_id);
         session()->flash('success','successfully deleted');
         $this->emit('hideModal','deleteConfirmation');
    }

    public function confirmDelete($id)
    {
        $this->student_id = $id;
    }

    
}
