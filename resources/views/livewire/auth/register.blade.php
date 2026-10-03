<div>

    <div class="modal fade"
         id="exampleModalToggle2"
         aria-hidden="true"
         data-bs-backdrop="static"
         data-bs-keyboard="false"
         aria-labelledby="exampleModalToggleLabel2"
         tabindex="-1"
         wire:ignore.self>

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content pandoras-register-modal">

                {{-- HEADER --}}
                <div class="modal-header pandoras-register-header">

                    <div>
                        <span class="register-label">
                            PANDORAS ACCOUNT
                        </span>

                        <h5 class="modal-title register-title">
                            Register for Account
                        </h5>

                        <p class="register-subtitle">
                            Create your account to get started.
                        </p>
                    </div>

                    <button type="button"
                            class="btn-close pandoras-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            wire:click="clearFields">
                    </button>

                </div>


                {{-- BODY --}}
                <div class="modal-body pandoras-register-body">

                    <form wire:submit="register" id="regForm">

                        {{-- FIRST NAME --}}
                        <div class="register-field">
                            <label>First Name</label>

                            <input type="text"
                                   class="form-control register-input @error('fname') is-invalid @else @if (!empty($fname)) is-valid @endif @enderror"
                                   name="first_name"
                                   placeholder="First Name"
                                   wire:model.live="fname"
                                   required>
                        </div>

                        @error('fname')
                            <span class="register-error">{{ $message }}</span>
                        @enderror


                        {{-- LAST NAME --}}
                        <div class="register-field">
                            <label>Last Name</label>

                            <input type="text"
                                   class="form-control register-input @error('lname') is-invalid @else @if (!empty($lname)) is-valid @endif @enderror"
                                   name="last_name"
                                   placeholder="Last Name"
                                   wire:model.live="lname"
                                   required>
                        </div>

                        @error('lname')
                            <span class="register-error">{{ $message }}</span>
                        @enderror


                        {{-- PHONE --}}
                        <div class="register-field">
                            <label>Phone Number</label>

                            <input type="tel"
                                   class="form-control register-input @error('phone') is-invalid @else @if (!empty($phone)) is-valid @endif @enderror"
                                   name="phone"
                                   placeholder="Phone Number"
                                   wire:model.live="phone"
                                   required>
                        </div>

                        @error('phone')
                            <span class="register-error">{{ $message }}</span>
                        @enderror


                        {{-- EMAIL --}}
                        <div class="register-field">
                            <label>Email Address</label>

                            <input type="email"
                                   class="form-control register-input @error('regEmail') is-invalid @else @if (!empty($regEmail)) is-valid @endif @enderror"
                                   name="email"
                                   placeholder="Email Address"
                                   wire:model.live="regEmail"
                                   required>
                        </div>

                        @error('regEmail')
                            <span class="register-error">{{ $message }}</span>
                        @enderror


                        {{-- PASSWORD --}}
                        <div class="register-field">

                            <label>Password</label>

                            <div class="register-password">

                                <input type="password"
                                       id="regPassword"
                                       class="form-control register-input @if($errors->has('confirmPass') || $errors->has('regPassword')) is-invalid @elseif (!empty($confirmPass)) is-valid @endif"
                                       name="password"
                                       placeholder="Password"
                                       autocomplete="new-password"
                                       wire:model="regPassword"
                                       required>

                                <i class="bi bi-eye-fill register-eye d-none"
                                   id="eyeRegPassword">
                                </i>

                            </div>

                        </div>

                        @error('regPassword')
                            <span class="register-error">{{ $message }}</span>
                        @enderror


                        {{-- CONFIRM PASSWORD --}}
                        <div class="register-field">

                            <label>Confirm Password</label>

                            <div class="register-password">

                                <input type="password"
                                       id="confirmPassword"
                                       class="form-control register-input @if($errors->has('confirmPass') || $errors->has('regPassword')) is-invalid @elseif (!empty($confirmPass)) is-valid @endif"
                                       name="password_confirmation"
                                       placeholder="Confirm Password"
                                       autocomplete="new-password"
                                       wire:model="confirmPass"
                                       required>

                                <i class="bi bi-eye-fill register-eye d-none"
                                   id="toggleConfirmPass">
                                </i>

                            </div>

                        </div>

                        @error('confirmPass')
                            <span class="register-error">{{ $message }}</span>
                        @enderror


                        {{-- REGISTER BUTTON --}}
                        <button type="submit"
                                class="register-main-btn">

                            Register

                            <i class="bi bi-arrow-right ms-2"></i>

                        </button>

                    </form>


                    {{-- DIVIDER --}}
                    <div class="register-divider">
                        <span>OR</span>
                    </div>


                    {{-- GOOGLE --}}
                    <a wire:click="redirectToGoogle"
                       class="register-social google">

                        <i class="bi bi-google"></i>

                        <span>Sign up with Google</span>

                    </a>


                    {{-- FACEBOOK --}}
                    <a wire:click="redirectToFacebook"
                       class="register-social facebook">

                        <i class="bi bi-facebook"></i>

                        <span>Sign up with Facebook</span>

                    </a>


                    {{-- LOGIN --}}
                    <div class="register-login">

                        <span>
                            Already have an account?
                        </span>

                        <a href="#"
                           wire:click="clearFields"
                           data-bs-target="#exampleModalToggle"
                           data-bs-toggle="modal">

                            Login Now

                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>