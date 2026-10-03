<div class="modal fade"
    id="deleteProfile{{ $profile->id }}"
    tabindex="-1"
    aria-labelledby="deleteProfileLabel{{ $profile->id }}"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title fw-semibold"
                    id="deleteProfileLabel{{ $profile->id }}">
                    Delete Profile
                </h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="text-center py-3">

                    <div class="mb-3 mx-auto d-flex align-items-center justify-content-center rounded-circle bg-danger-subtle text-danger"
                        style="width: 60px; height: 60px;">

                        <i class="fas fa-trash fs-4"></i>

                    </div>

                    <h5 class="fw-semibold mb-2">
                        Delete this profile?
                    </h5>

                    <p class="text-muted mb-0">
                        You are about to delete the profile of
                        <strong>
                            {{ $profile->user->name ?? 'Unknown User' }}
                        </strong>.
                    </p>

                    <p class="text-muted small mt-2 mb-0">
                        This action cannot be undone.
                    </p>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                    class="btn btn-light border"
                    data-bs-dismiss="modal">
                    Cancel
                </button>

                <form action="{{ route('profile.destroy', $profile->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <button type="submit"
                        class="btn btn-danger">

                        <i class="fas fa-trash me-1"></i>
                        Delete Profile

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
