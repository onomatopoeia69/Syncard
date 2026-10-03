{{-- modal for forgot password --}}
@teleport('body')
 <div class="modal fade" id="forgotPasswordModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" wire:ignore.self>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content bg-gray-100">

     {{-- Header --}}
      <div class="modal-header border-0">
        <h5 class="modal-title fw-semibold" id="loginModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="clearFields"></button>
      </div>

      {{-- body of the register--}}
    <div class="modal-body">

     <form wire:submit.prevent="forgotRegister">

         <div class="mb-3">
            <input type="email"
                class="form-control @error('forgotEmail') is-invalid   @else  @if (!empty($forgotEmail)) is-valid  @endif @enderror"
                name="first_name" placeholder="Email" wire:model.live='forgotEmail' required>
        </div>
        @if($errors->has('forgotEmail'))
            <span class="text-danger">{{ $errors->first('forgotEmail') }}</span>
        @elseif(!empty($forgotEmail))
            <span class="text-success">A user found.</span>
        @endif

        <button type="submit" @error('forgotEmail') disabled   @else  @if (empty($forgotEmail)) disabled @endif @enderror class="btn btn-warning text-black fw-semibold w-100">Reset Password</button>
     </form>

    
     {{-- second modal trigger back to login --}}
      <div class="text-center mt-4">
            <small class="text-black fw-semibold">
              Remembered your password?
              <a href="#" class="text-decoration-underline fw-semibold text-primary" wire:click="clearFields" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login Now</a>
            </small>
      </div>
    </div>
       
        {{-- Optional footer (empty) --}}
      <div class="modal-footer border-0 pt-0"></div>
    </div>
  </div>
</div>
@endteleport
