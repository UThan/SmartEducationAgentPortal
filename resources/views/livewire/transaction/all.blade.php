<div class="container-xxl flex-grow-1 container-p-y">
    <x-dashboard.toast />
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> List</h4>
    

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Transaction List</h5>
        </div>

        <x-table.searchbar>
            <a href="{{ route('transaction.create') }}" class="btn btn-primary" type="button">                            
                <i class="bx bx-plus me-0 me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Register</span>
        </x-table.searchbar>
        
        <div class="table-responsive text-nowrap">
            <x-table.table>
                <x-slot name='heading'>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Actions</th>
                </x-slot>

                @foreach ($transactions as $transaction)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $transaction->title }}</strong>
                        </td>
                        <td>
                            @if (strlen($transaction->description) > 30)
                                {{str_split($transaction->description,30)[0] . '...'}}
                            @else
                                {{ $transaction->description }}
                            @endif
                        </td>
                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                        <td><span class="badge bg-label-{{$transaction->type == 'Income' ? 'success' : 'danger'}} me-1">{{ $transaction->type }}</span></td>                        
                        <td> 
                            <x-table.action>
                                <a class="dropdown-item" href="{{ route('transaction.edit',['id' => $transaction->id ]) }}"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" wire:click='confirmDelete({{$transaction->id}})' data-bs-target="#deleteConfirmation"><i
                                        class="bx bx-trash me-1"></i> Delete</a>                                
                            </x-table.action>
                        </td>
                    </tr>
                @endforeach

            </x-table.table>

            @if ($transactions->hasPages())
                <div class="card-footer pb-0">
                    {{ $transactions->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->


    <x-ui.deleteconfirmmodal id='deleteConfirmation' />     


</div>
