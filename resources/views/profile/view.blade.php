@foreach ($profiles as $profile)

<div class="modal fade"
    id="viewProfile{{ $profile->id }}"
    tabindex="-1"
    aria-labelledby="viewProfileLabel{{ $profile->id }}"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <div>
                    <h5 class="modal-title fw-semibold"
                        id="viewProfileLabel{{ $profile->id }}">
                        Profile Details
                    </h5>

                    <p class="mb-0 text-muted small">
                        View profile information
                    </p>
                </div>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <h4 class="mb-1">
                    {{ $profile->user->name ?? 'Unknown User' }}
                </h4>

                <p class="text-muted">
                    {{ '@' . $profile->username }}
                </p>

                <hr>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <strong>Job Title</strong>
                        <div>
                            {{ $profile->job_title ?: '—' }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Business / Organization</strong>
                        <div>
                            {{ $profile->company ?: '—' }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Email</strong>
                        <div>
                            {{ $profile->user->email ?? '—' }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Phone Number</strong>
                        <div>
                            {{ $profile->phone ?: '—' }}
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <strong>Home Address</strong>
                        <div>
                            {{ $profile->address ?: '—' }}
                        </div>
                    </div>

                    <div class="col-12">
                        <strong>Bio</strong>
                        <div>
                            {{ $profile->bio ?: 'No bio provided.' }}
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                    class="btn btn-light border"
                    data-bs-dismiss="modal">

                    Close

                </button>

            </div>

        </div>

    </div>

</div>

@endforeach
