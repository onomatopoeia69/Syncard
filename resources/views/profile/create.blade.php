<div class="modal fade" id="createProfileModal" tabindex="-1" aria-labelledby="createProfileModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            {{-- Header --}}
            <div class="modal-header">

                <div>
                    <h5 class="modal-title fw-semibold" id="createProfileModalLabel">
                        Create Profile
                    </h5>

                    <p class="mb-0 text-muted small">
                        Create a profile for a user who does not have one yet.
                    </p>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

            </div>


            {{-- Form --}}
            <form action="{{ route('profile.store') }}" method="POST" id="createProfileForm">

                @csrf

                <div class="modal-body">

                    {{-- User --}}
                    <div class="mb-4">

                        <label for="profileUser" class="form-label fw-semibold">
                            User
                        </label>

                        <select name="user_id" id="profileUser" class="form-select" required>

                            <option value="" selected disabled>
                                Select a user...
                            </option>

                            @forelse ($usersWithoutProfile as $user)

                            <option value="{{ $user->id }}">
                                {{ $user->name }} — {{ $user->email }}
                            </option>

                            @empty

                            <option value="" disabled>
                                No users available.
                            </option>

                            @endforelse

                        </select>

                        <div class="form-text">
                            Select a user who does not have a profile yet.
                        </div>

                    </div>


                    {{-- Username --}}
                    <div class="mb-3">

                        <label for="username" class="form-label fw-semibold">
                            Username
                        </label>

                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter username" required>

                    </div>


                    {{-- Job Title / Business --}}
                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="job_title" class="form-label fw-semibold">
                                Job Title
                            </label>

                            <input type="text" name="job_title" id="job_title" class="form-control"
                                placeholder="e.g. Software Developer">

                        </div>


                        <div class="col-md-6 mb-3">

                            <label for="company" class="form-label fw-semibold">
                                Business / Organization
                            </label>

                            <input type="text" name="company" id="company" class="form-control"
                                placeholder="e.g. Pandora">

                        </div>

                    </div>


                    {{-- Bio --}}
                    <div class="mb-3">

                        <label for="bio" class="form-label fw-semibold">
                            Bio
                        </label>

                        <textarea name="bio" id="bio" rows="3" class="form-control"
                            placeholder="Tell something about this profile..."></textarea>

                    </div>


                    {{-- Phone / Home Address --}}
                    <div class="row">

                        {{-- Phone Number --}}
                        <div class="col-md-6 mb-3">

                            <label for="phone" class="form-label fw-semibold">
                                Phone Number
                            </label>

                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="09XXXXXXXXX"
                                maxlength="11" minlength="11" pattern="09[0-9]{9}" inputmode="numeric"
                                title="Phone number must start with 09 and contain exactly 11 digits.">

                            <div class="form-text">
                                Enter an 11-digit Philippine mobile number starting with 09.
                            </div>

                        </div>


                        {{-- Home Address --}}
                        <div class="col-md-6 mb-3">

                            <label for="address" class="form-label fw-semibold">
                                Home Address
                            </label>

                            <textarea name="address" id="address" rows="2" class="form-control"
                                placeholder="Enter home address"></textarea>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="modal-footer">

                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <button type="submit" class="btn btn-primary">

                        <i class="fas fa-plus me-1"></i>

                        Create Profile

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
