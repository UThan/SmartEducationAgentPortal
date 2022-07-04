<div class="container-xxl flex-grow-1 container-p-y">
    <x-dashboard.toast />
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-3 gap-2">
                                <h3 class="text-body fw-bolder mb-0">{{ ucfirst($student->name) }}</h3>
                            </div>
                            <p class="mb-1">
                                <i class='bx bx-map'></i>
                                <span>{{ $student->address }}</span>
                            </p>
                            <p class="mb-1">
                                <i class='bx bx-envelope me-1'></i>
                                <span>{{ $student->email }}</span>
                            </p>
                            <p class="mb-0">
                                <i class='bx bxs-phone-call me-1'></i>
                                <span>{{ $student->phone }}</span>
                            </p>
                        </div>
                        <div>
                            <h5>Status : <span class="text-success">{{ $student->status }}</span></h5>
                            <div class="mb-2">
                                <span class="me-1">Start Date:</span>
                                <span class="fw-semibold">{{ $student->created_at->format('Y/m/d') }}</span>
                            </div>
                            <div>
                                <span class="me-1">Last Modified:</span>
                                <span class="fw-semibold">{{ $student->updated_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                            <h6 class="pb-2">Prograss:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-3">Application:</td>
                                        <td>{{ $student->application_status }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Visa:</td>
                                        <td>{{ $student->visa_status }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Coe Status:</td>
                                        <td>{{ $student->coe_status }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Offer:</td>
                                        <td>{{ $student->offer_status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                            <h6 class="pb-2">Institute::</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-3">City:</td>
                                        <td>{{ $student->targeted_city->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Institute:</td>
                                        <td>{{ $student->institute->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3">Course:</td>
                                        <td>{{ $student->course->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if ($student->payments->count())
                    <div class="table-responsive mb-3">
                        <table class="table border-top m-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->payments as $value)
                                    <tr>
                                        <td class="text-nowrap">{{ $value->type }}</td>
                                        <td class="text-nowrap">{{ $value->amount }} {{ $value->currency }}</td>
                                        <td>{{ $value->created_at->format('Y/m/d') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary btn-icon" wire:click='deletePayment({{$value->id}})'>
                                                <span class="tf-icons bx bx-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <span class="fw-semibold">Note:</span>
                            <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                                future freelance
                                projects. Thank You!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="modal"
                        data-bs-target="#addDescriptionModal">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="bx bx-plus bx-xs me-3"></i>Add Description</span>
                    </a>
                    @can('make-payment')
                        <a href="#" class="btn btn-primary d-grid w-100" data-bs-toggle="modal"
                        data-bs-target="#addPaymentModal">
                                <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="bx bx-dollar bx-xs me-3"></i>Make Payment</span>
                        </a>
                    @endcan 
                </div>
            </div> 
            
            @if ($student->descriptions->count())
              <div class="demo-inline-spacing mt-3">
                <div class="list-group">
                  @foreach ($student->descriptions as $item)
                    <li href="#" class="bg-white list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex justify-content-between w-100">
                        <h5 class="mb-1">{{$item->title}}</h5>
                        <a href="#" wire:click='deleteDecription({{$item->id}})'><small>Delete</small></a>
                      </div>
                      <p class="mb-1">
                        {{$item->body}}
                      </p>
                      <small>{{$item->created_at->format('Y/m/d')}}</small>
                    </li>
                  @endforeach                
                </div>
              </div>
            @endif
        </div>
        <!-- /Invoice Actions -->
    </div>


    <x-ui.modal id="addDescriptionModal">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add description</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <x-form.input name="description.title" placeholder="Description title" label="Title" icon="bx-comment" />
            <x-form.textarea name="description.body" placeholder="Enter description..." label="Description"
                icon="bx-comment" />
        </div>
        <div class="modal-footer">
            <div class="row justify-content-end">
                <div class="col">
                    <button class="btn btn-primary" wire:click='createDescription()'>
                        <i class="bx bx-plus me-0 me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add</span>
                    </button>
                </div>
            </div>
        </div>
    </x-ui.modal>



    <x-ui.modal id="addPaymentModal">
        <div class="modal-header">
            <h5 class="modal-title">Make New Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <x-form.radiogroup label='Payment Type' name='payment.type' :data="$payment_types" />
            <x-form.input type="number" name="payment.amount" placeholder="Enter amount" label="Deposit Amount"
                icon="bx-dollar" />
            <x-form.radiogroup label='' name="payment.currency" :data="$currencies" />
        </div>
        <div class="modal-footer">
            <div class="row justify-content-end">
                <div class="col">
                    <button class="btn btn-primary" wire:click='createPayment()'>
                        <i class="bx bx-dollar me-0 me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Pay</span>
                    </button>
                </div>
            </div>
        </div>
    </x-ui.modal>

</div>
