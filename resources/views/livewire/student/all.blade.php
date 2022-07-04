<div class="container-xxl flex-grow-1 container-p-y">
    <x-dashboard.toast />
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Student /</span> List</h4>
    

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Student List</h5>
        </div>

        <x-table.searchbar>
            @can('create', App\Models\Student::class)
                <a href="{{ route('student.create') }}" class="btn btn-primary" type="button">                            
                <i class="bx bx-plus me-0 me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Register</span>
            @endcan
        </x-table.searchbar>
        
        <div class="table-responsive text-nowrap">
            <x-table.table>
                <x-slot name='heading'>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Application</th>
                    <th>Description</th>
                    <th>Actions</th>
                </x-slot>

                @foreach ($students as $student)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $student->name }}</strong>
                        </td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td><span class="badge bg-label-success me-1">{{ $student->status }}</span></td>
                        <td><span class="badge bg-label-primary me-1" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                data-bs-placement="bottom" data-bs-html="true"
                                title="<i class='bx bx-heart bx-xs'></i> <span>Tooltip on bottom</span>">2</span></td>
                        <td>
                            <x-table.action>
                                <a class="dropdown-item" href="{{ route('student.view',['id' => $student->id ]) }}"><i class="bx bx-show-alt me-1"></i>View</a>
                                @can('update', $student)
                                    <a class="dropdown-item" href="{{ route('student.edit',['id' => $student->id ]) }}"><i
                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                @endcan
                                @can('delete', $student)
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" wire:click='confirmDelete({{$student->id}})' data-bs-target="#deleteConfirmation"><i
                                    class="bx bx-trash me-1"></i> Delete</a>
                                @endcan
                            </x-table.action>
                        </td>
                    </tr>
                @endforeach

            </x-table.table>

            @if ($students->hasPages())
                <div class="card-footer pb-0">
                    {{ $students->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->


    <x-ui.deleteconfirmmodal id='deleteConfirmation' />     


</div>
