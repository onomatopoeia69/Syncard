<div class="modal fade"
    id="editProfile{{ $profile->id }}"
    tabindex="-1"
    aria-labelledby="editProfileLabel{{ $profile->id }}"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <form action="{{ route('profile.update', $profile->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-header">

                    <div>
                        <h5 class="modal-title fw-semibold"
                            id="editProfileLabel{{ $profile->id }}">
                            Edit Profile
                        </h5>

                        <p class="mb-0 text-muted small">
                            Update profile information
                        </p>
                    </div>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    {{-- User --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            User
                        </label>

                        <input type="text"
                            class="form-control"
                            value="{{ $profile->user->name ?? 'Unknown User' }}"
                            disabled>

                    </div>


                    {{-- Username --}}
                    <div class="mb-3">

                        <label for="username{{ $profile->id }}"
                            class="form-label fw-semibold">

                            Username

                        </label>

                        <input type="text"
                            name="username"
                            id="username{{ $profile->id }}"
                            class="form-control"
                            value="{{ $profile->username }}"
                            required>

                    </div>


                    {{-- Job Title / Business --}}
                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="job_title{{ $profile->id }}"
                                class="form-label fw-semibold">

                                Job Title

                            </label>

                            <input type="text"
                                name="job_title"
                                id="job_title{{ $profile->id }}"
                                class="form-control"
                                value="{{ $profile->job_title }}"
                                placeholder="e.g. Software Developer">

                        </div>


                        <div class="col-md-6 mb-3">

                            <label for="company{{ $profile->id }}"
                                class="form-label fw-semibold">

                                Business / Organization

                            </label>

                            <input type="text"
                                name="company"
                                id="company{{ $profile->id }}"
                                class="form-control"
                                value="{{ $profile->company }}"
                                placeholder="e.g. Pandora">

                        </div>

                    </div>


                    {{-- Bio --}}
                    <div class="mb-3">

                        <label for="bio{{ $profile->id }}"
                            class="form-label fw-semibold">

                            Bio

                        </label>

                        <textarea name="bio"
                            id="bio{{ $profile->id }}"
                            rows="3"
                            class="form-control"
                            placeholder="Tell something about this profile...">{{ $profile->bio }}</textarea>

                    </div>


                    {{-- Phone / Address --}}
                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="phone{{ $profile->id }}"
                                class="form-label fw-semibold">

                                Phone Number

                            </label>

                            <input type="tel"
                                name="phone"
                                id="phone{{ $profile->id }}"
                                class="form-control"
                                value="{{ $profile->phone }}"
                                placeholder="09XXXXXXXXX"
                                maxlength="11"
                                minlength="11"
                                pattern="09[0-9]{9}"
                                inputmode="numeric"
                                title="Phone number must start with 09 and contain exactly 11 digits.">

                            <div class="form-text">
                                Enter an 11-digit Philippine mobile number starting with 09.
                            </div>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label for="address{{ $profile->id }}"
                                class="form-label fw-semibold">

                                Home Address

                            </label>

                            <textarea name="address"
                                id="address{{ $profile->id }}"
                                rows="2"
                                class="form-control"
                                placeholder="Enter home address">{{ $profile->address }}</textarea>

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-light border"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save me-1"></i>

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
