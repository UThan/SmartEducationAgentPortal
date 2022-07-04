<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('student.all') }}" class="text-light fw-light">Student </a>/ Edit</h4>
    
    <x-dashboard.toast/> 
    {{-- <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Student Information</h5>          
        </div>
        <div class="card-body">
          <form wire:submit.prevent='submit'>
            <x-inlineform.input name="student.name" placeholder="Your Name" label="Name" icon="bx-user"/>
            <x-inlineform.input type="email" name="student.email" placeholder="name@company.com" label="Email" icon="bx-envelope"/>
            <x-inlineform.input type="tel" name="student.phone" placeholder="+95 94456789" label="Phone" icon="bx-phone"/>            
            <x-inlineform.textarea name="student.address" placeholder="Full Address..." label="Address" icon="bx-comment"/>       
            
            <hr>

            <x-inlineform.select label='City' name='student.targeted_city_id' :model="$cities"/>
            <x-inlineform.select label='Course' name='student.course_id' :model="$courses"/>
            <x-inlineform.select label='Institute' name='student.institute_id' :model="$institutes"/>

            <hr>
            
            <x-inlineform.radiogroup label='Visa Status' name='student.visa_status' :data="$visa_status"/>
            <x-inlineform.radiogroup label='Application Status' name='student.application_status' :data="$application_status"/>
            <x-inlineform.radiogroup label='Offer Status' name='student.offer_status' :data="$offer_status"/>
            <x-inlineform.radiogroup label='COE Status' name='student.coe_status' :data="$coe_status"/>              

            <hr>

            <x-inlineform.input type="number" name="deposit" placeholder="Enter amount" label="Deposit Amount" icon="bx-dollar"/> 

            <x-inlineform.radiogroup label='' name="currency" :data="$currencies"/>

            <hr>

            

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-save me-0 me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">Save</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>     --}}


      <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs" role="tablist"  wire:ignore>
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">Profile</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-school" aria-controls="navs-top-school" aria-selected="true">School</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-status" aria-controls="navs-top-status" aria-selected="false">Status</button>
          </li>
        </ul>

        <div class="tab-content">

          
            <div class="tab-pane fade active show" id="navs-top-profile" role="tabpanel" wire:ignore.self>
              <form wire:submit.prevent='submit'>
                <x-inlineform.input name="student.name" placeholder="Your Name" label="Name" icon="bx-user"/>
                <x-inlineform.input type="email" name="student.email" placeholder="name@company.com" label="Email" icon="bx-envelope"/>
                <x-inlineform.input type="tel" name="student.phone" placeholder="+95 94456789" label="Phone" icon="bx-phone"/>            
                <x-inlineform.textarea name="student.address" placeholder="Full Address..." label="Address" icon="bx-comment"/> 
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <x-inlineform.submit icon='bx-save' label='Save'/>
                  </div>
                </div>
              </form>
            </div>
  
            <div class="tab-pane fade" id="navs-top-school" role="tabpanel" wire:ignore.self>
              <form wire:submit.prevent='submit'>
                <x-inlineform.select label='City' name='student.targeted_city_id' :model="$cities"/>
                <x-inlineform.select label='Course' name='student.course_id' :model="$courses"/>
                <x-inlineform.select label='Institute' name='student.institute_id' :model="$institutes"/>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <x-inlineform.submit icon='bx-save' label='Save'/>
                  </div>
                </div> 
              </form>          
            </div>
  
            <div class="tab-pane fade" id="navs-top-status" role="tabpanel" wire:ignore.self>
              <form wire:submit.prevent='submit'>
                <x-inlineform.radiogroup label='Visa Status' name='student.visa_status' :data="$visa_status"/>
                <x-inlineform.radiogroup label='Application Status' name='student.application_status' :data="$application_status"/>
                <x-inlineform.radiogroup label='Offer Status' name='student.offer_status' :data="$offer_status"/>
                <x-inlineform.radiogroup label='COE Status' name='student.coe_status' :data="$coe_status"/>   
                <x-inlineform.radiogroup label='Transaction Status' name='student.status' :data="$status"/>       
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <x-inlineform.submit icon='bx-save' label='Save'/>
                  </div>
                </div> 
            </form>           
            </div>
          

        </div>
      </div>
        
</div>