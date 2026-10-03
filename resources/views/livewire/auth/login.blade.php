<div>


    {{-- login modal --}}
    <div class="modal fade nfc-auth-modal"
         id="exampleModalToggle"
         tabindex="-1"
         aria-labelledby="loginModalLabel"
         aria-hidden="true"
         data-bs-backdrop="static"
         data-bs-keyboard="false"
         wire:ignore.self>

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content nfc-modal-content">

                {{-- Close --}}
                <button type="button"
                        class="nfc-modal-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        wire:click="clearFields">
                    <i class="bi bi-x-lg"></i>
                </button>

                {{-- Header --}}
                <div class="nfc-modal-header">

                    <div class="nfc-auth-icon">
                        <i class="bi bi-broadcast-pin"></i>
                    </div>

                    <div>
                        <div class="nfc-auth-label">
                            NFC ACCESS
                        </div>

                        <h5 class="nfc-modal-title"
                            id="loginModalLabel">
                            Welcome Back
                        </h5>

                        <p class="nfc-modal-subtitle">
                            Login to your NFC account
                        </p>
                    </div>

                </div>

                {{-- Body --}}
                <div class="modal-body nfc-modal-body">

                    <form id="loginForm"
                          wire:submit="inputLogin"
                          class="needs-validation"
                          novalidate>

                        {{-- EMAIL --}}
                        <div class="nfc-input-group mb-3">

                            <label for="floatingInput">
                                Email Address
                            </label>

                            <div class="nfc-input-wrapper">

                                <i class="bi bi-envelope nfc-input-icon"></i>

                                <input type="email"
                                       id="floatingInput"
                                       wire:model="email"
                                       class="nfc-input @error('email') nfc-input-error @enderror"
                                       placeholder="you@example.com"
                                       required>

                            </div>

                            @error('email')
                                <div class="nfc-error">
                                    <i class="bi bi-exclamation-circle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- PASSWORD --}}
                        <div class="nfc-input-group mb-3">

                            <label for="loginPassword">
                                Password
                            </label>

                            <div class="nfc-input-wrapper">

                                <i class="bi bi-lock nfc-input-icon"></i>

                                <input
                                    type="password"
                                    id="loginPassword"
                                    wire:model="password"
                                    class="nfc-input pe-5 @error('password') nfc-input-error @enderror"
                                    placeholder="••••••••"
                                    required
                                    data-password-input>

                                <i
                                    class="bi bi-eye-fill nfc-password-toggle d-none"
                                    id="eyeloginPassword">
                                </i>

                            </div>

                            @error('password')
                                <div class="nfc-error">
                                    <i class="bi bi-exclamation-circle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- FORGOT PASSWORD --}}
                        <div class="text-end mb-4">

                            <a href="#"
                               class="nfc-forgot-link"
                               wire:click="clearFields"
                               data-bs-toggle="modal"
                               data-bs-target="#forgotPasswordModal"
                               data-bs-dismiss="modal">

                                Forgot Password?

                                <i class="bi bi-arrow-up-right"></i>

                            </a>

                        </div>


                        {{-- LOGIN BUTTON --}}
                        <div class="mb-3">

                            @if ($cooldown > 0)

                                <button type="button"
                                        class="nfc-auth-button nfc-disabled-button"
                                        disabled>

                                    <i class="bi bi-clock me-2"></i>

                                    Please wait {{ $cooldown }}s

                                </button>

                            @else

                                <button type="submit"
                                        wire:loading.attr="disabled"
                                        class="nfc-auth-button">

                                    <span wire:loading.remove
                                          wire:target="inputLogin">

                                        Login

                                        <i class="bi bi-arrow-right ms-2"></i>

                                    </span>

                                    <span wire:loading
                                          wire:target="inputLogin">

                                        <span class="spinner-border spinner-border-sm"
                                              role="status">
                                        </span>

                                        <span class="ms-2">
                                            Signing in...
                                        </span>

                                    </span>

                                </button>

                            @endif

                        </div>


                        {{-- DIVIDER --}}
                        <div class="nfc-divider">
                            <span>OR CONTINUE WITH</span>
                        </div>


                        {{-- SOCIAL LOGIN --}}
                        <div class="nfc-social-buttons">

                            <button type="button"
                                    wire:click="redirectToGoogle"
                                    class="nfc-social-button">

                                <i class="bi bi-google"></i>

                                <span>Google</span>

                            </button>


                            <button type="button"
                                    wire:click="redirectToFacebook"
                                    class="nfc-social-button">

                                <i class="bi bi-facebook"></i>

                                <span>Facebook</span>

                            </button>

                        </div>


                        {{-- REGISTER --}}
                        <div class="nfc-register-switch">

                            <span>
                                Don't have an account?
                            </span>

                            <a href="#"
                               wire:click="clearFields"
                               data-bs-target="#exampleModalToggle2"
                               data-bs-toggle="modal">

                                Register here
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>


                    </form>

                </div>


                {{-- Footer --}}
                <div class="nfc-modal-footer">

                    <i class="bi bi-shield-check"></i>

                    Secure NFC account access

                </div>


                {{-- COOLDOWN --}}
                @if ($cooldown > 0)

                    <div wire:poll.keep-alive.1000ms="decrementCooldown"></div>

                @endif

            </div>

        </div>

    </div>


    {{-- register modal --}}
    <livewire:auth.register />


    {{-- forget pass --}}
    @include('livewire.auth.forgotpassword')

</div>