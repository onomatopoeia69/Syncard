<link rel="stylesheet" href="{{ asset('css/landing.css') }}">

{{-- Forgot Password Modal --}}
@teleport('body')
<div
    class="modal fade sync-forgot-modal"
    id="forgotPasswordModal"
    aria-hidden="true"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    aria-labelledby="forgotPasswordModalLabel"
    tabindex="-1"
    wire:ignore.self>

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content sync-forgot-content">

            {{-- Header --}}
            <div class="modal-header sync-forgot-header">
                <div class="d-flex align-items-center gap-3">

                    <div class="forgot-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>

                    <div>
                        <h5 class="modal-title" id="forgotPasswordModalLabel">
                            Forgot Password?
                        </h5>

                        <p class="forgot-subtitle mb-0">
                            Let's help you get back into your account.
                        </p>
                    </div>

                </div>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    wire:click="clearFields">
                </button>
            </div>

            {{-- Body --}}
            <div class="modal-body sync-forgot-body">

                <div class="forgot-description">
                    Enter the email address associated with your
                    SyncCard account. We'll help you reset your password.
                </div>

                <form wire:submit.prevent="forgotRegister">

                    {{-- Email --}}
                    <div class="mb-3">

                        <label for="forgotEmail" class="forgot-label">
                            Email Address
                        </label>

                        <div class="forgot-input-wrapper">
                            <i class="bi bi-envelope"></i>

                            <input
                                id="forgotEmail"
                                type="email"
                                class="form-control sync-forgot-input
                                    @error('forgotEmail') is-invalid
                                    @else
                                        @if (!empty($forgotEmail)) is-valid @endif
                                    @enderror"
                                name="forgotEmail"
                                placeholder="Enter your email address"
                                wire:model.live="forgotEmail"
                                autocomplete="email"
                                required>
                        </div>

                        @error('forgotEmail')
                            <div class="forgot-feedback error-feedback">
                                <i class="bi bi-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                            
                        @elseif(!empty($forgotEmail))
                            <div class="forgot-feedback success-feedback">
                                <i class="bi bi-check-circle"></i>
                                <span>A user found.</span>
                            </div>
                        @enderror

                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        @error('forgotEmail')
                            disabled
                        @else
                            @if (empty($forgotEmail)) disabled @endif
                        @enderror
                        class="btn sync-reset-btn w-100">

                        <span wire:loading.remove wire:target="forgotRegister">
                            <i class="bi bi-arrow-repeat me-2"></i>
                            Reset Password
                        </span>

                        <span wire:loading wire:target="forgotRegister">
                            <span
                                class="spinner-border spinner-border-sm me-2"
                                aria-hidden="true">
                            </span>
                            Processing...
                        </span>
                    </button>

                </form>

                {{-- Back to Login --}}
                <div class="forgot-login-link">
                    <span>Remembered your password?</span>

                    <a
                        href="#"
                        wire:click="clearFields"
                        data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">

                        Login Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>

            {{-- Footer --}}
            <div class="sync-forgot-footer">
                <i class="bi bi-lock-fill"></i>
                <span>Your account security matters to us.</span>
            </div>

        </div>
    </div>
</div>
@endteleport