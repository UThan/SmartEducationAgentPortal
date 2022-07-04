<div class="container-xxl flex-grow-1 container-p-y">
    <x-dashboard.toast />
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Partner /</span> All</h4>
    

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Partner List</h5>
        </div>

        <x-table.searchbar>
            <a href="{{ route('partner.create') }}" class="btn btn-primary" type="button">                            
                <i class="bx bx-plus me-0 me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Register</span>
        </x-table.searchbar>
        
        <div class="table-responsive text-nowrap">
            <x-table.table>
                <x-slot name='heading'>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Tution Fees</th>
                    <th>Scholarship</th>
                    <th>Agreement Date</th>
                    <th>Expire Date</th>
                @can(['update','delete'], App\Models\Partner::class)
                    <th>Action</th>
                @endcan   
                </x-slot>

                @foreach ($partners as $partner)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $partner->name }}</strong>
                        </td>
                        <td>{{ $partner->type }}</td>
                        <td>{{ $partner->annual_tution_fees }}</td>
                        <td><span class="badge bg-label-success me-1">{{ $partner->scholarship_offer ? 'Yes' : 'No' }}</span></td>
                        <td>{{ $partner->agreement_date }}</td>
                        <td>{{ $partner->end_date  }}</td>
                        @can('update', App\Models\Partner::class)
                            <td>
                                <x-table.action>
                                    <a class="dropdown-item" href="{{ route('partner.edit', ['id'=>$partner->id]) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" wire:click='confirmDelete({{$partner->id}})' data-bs-target="#deleteConfirmation"><i
                                            class="bx bx-trash me-1"></i> Delete</a>
                                </x-table.action>
                            </td>
                        @endcan
                    </tr>
                @endforeach

            </x-table.table>

            @if ($partners->hasPages())
                <div class="card-footer pb-0">
                    {{ $partners->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->


    <x-ui.deleteconfirmmodal id='deleteConfirmation' />     


</div>

