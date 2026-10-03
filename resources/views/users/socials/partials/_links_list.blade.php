<section style="
    width:100%;
    box-sizing:border-box;
">

    {{-- Section Header --}}
    <div style="
        display:flex;
        align-items:flex-end;
        justify-content:space-between;
        gap:20px;
        padding-bottom:18px;
        flex-wrap:wrap;
    ">

        <div style="
            min-width:0;
            flex:1;
        ">

            <div style="
                display:flex;
                align-items:center;
                gap:10px;
            ">

                <div style="
                    width:38px;
                    height:38px;
                    flex:0 0 38px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:11px;
                    background:#eef2ff;
                    color:#4f46e5;
                    border:1px solid #e0e7ff;
                    box-sizing:border-box;
                ">
                    <i class="fa-solid fa-share-nodes" style="
                        font-size:14px;
                    "></i>
                </div>

                <h2 style="
                    margin:0;
                    font-size:16px;
                    line-height:1.4;
                    font-weight:600;
                    letter-spacing:-0.01em;
                    color:#111827;
                ">
                    Connected profiles
                </h2>

            </div>

            <p style="
                margin:7px 0 0;
                font-size:13px;
                line-height:1.5;
                color:#6b7280;
            ">
                Manage the social media accounts and online profiles connected to your account.
            </p>

        </div>


        @if(isset($socials))

        <div style="
                flex-shrink:0;
            ">

            <span style="
                    display:inline-flex;
                    align-items:center;
                    gap:8px;
                    padding:7px 11px;
                    border-radius:10px;
                    background:#ffffff;
                    border:1px solid #e5e7eb;
                    color:#6b7280;
                    font-size:12px;
                    font-weight:500;
                    line-height:1;
                    box-shadow:0 1px 2px rgba(0,0,0,.04);
                    box-sizing:border-box;
                ">

                <span style="
                        width:7px;
                        height:7px;
                        display:block;
                        border-radius:50%;
                        background:#6366f1;
                        flex:0 0 7px;
                    "></span>

                {{ $socials->count() }}
                {{ Str::plural('profile', $socials->count()) }}

            </span>

        </div>

        @endif

    </div>


    {{-- Main Card --}}
    <div style="
        width:100%;
        overflow:hidden;
        border:1px solid #e5e7eb;
        border-radius:16px;
        background:#ffffff;
        box-shadow:0 1px 2px rgba(0,0,0,.04);
        box-sizing:border-box;
    ">

        @if($socials->isNotEmpty())


        {{-- Responsive Table Wrapper --}}
        <div style="
                width:100%;
                overflow-x:auto;
                -webkit-overflow-scrolling:touch;
            ">
            <div id="socialBulkActions" style="
        display:none;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        padding:10px 14px;
        margin-bottom:10px;
        border:1px solid #e5e7eb;
        border-radius:9px;
        background:#ffffff;
    ">
                <div style="
        font-size:12px;
        color:#6b7280;
    ">
                    <strong id="selectedSocialCount" style="color:#111827;">0</strong>
                    selected
                </div>

                <button type="button" id="bulkDeleteSocials" data-bs-toggle="modal" data-bs-target="#deleteSocialModal"
                    style="
            height:32px;
            padding:0 11px;
            border:1px solid #fecaca;
            border-radius:7px;
            background:#fffafa;
            color:#dc2626;
            font-size:11px;
            font-weight:600;
            cursor:pointer;
        ">
                    <i class="fa-solid fa-trash" style="margin-right:5px;"></i>
                    Delete Selected
                </button>
            </div>
            <table style="
                    width:100%;
                    min-width:900px;
                    border-collapse:collapse;
                    border-spacing:0;
                    text-align:left;
                ">

                {{-- Header --}}
                <thead>

                    <tr style="
                            background:#f9fafb;
                            border-bottom:1px solid #f0f1f3;
                        ">

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Platform
                        </th>

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Username
                        </th>

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Profile URL
                        </th>

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Label
                        </th>

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                text-align:center;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Visibility
                        </th>

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                text-align:center;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Verification
                        </th>

                        <th style="
                                padding:13px 18px;
                                white-space:nowrap;
                                text-align:right;
                                font-size:10px;
                                line-height:1.4;
                                font-weight:600;
                                text-transform:uppercase;
                                letter-spacing:.08em;
                                color:#6b7280;
                            ">
                            Actions
                        </th>
                        <th style="padding:13px 12px;text-align:center;width:45px;">
                            <input type="checkbox" id="selectAllSocials" style="
            width:15px;
            height:15px;
            cursor:pointer;
            accent-color:#4f46e5;
        ">
                        </th>
                    </tr>

                </thead>


                {{-- Body --}}
                <tbody>

                    @foreach($socials as $social)

                    <tr style="
                                border-bottom:1px solid #f1f1f3;
                            ">
                        <td style="padding:15px 12px;text-align:center;width:45px;">
                            <input type="checkbox" class="social-checkbox" value="{{ $social->id }}" style="
                width:15px;
                height:15px;
                cursor:pointer;
                accent-color:#4f46e5;
            ">
                        </td>

                        {{-- Platform --}}
                        <td style="
                                    padding:15px 18px;
                                    white-space:nowrap;
                                ">

                            <div style="
                                        display:flex;
                                        align-items:center;
                                        gap:11px;
                                    ">

                                <div style="
                                            width:40px;
                                            height:40px;
                                            flex:0 0 40px;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            border-radius:11px;
                                            border:1px solid #e5e7eb;
                                            background:#f9fafb;
                                            color:#4b5563;
                                            box-sizing:border-box;
                                        ">

                                    @if($social->icon)
                                    <i class="{{ $social->icon }}" style="
                                                    font-size:15px;
                                                "></i>
                                    @else
                                    <i class="fa-solid fa-link" style="
                                                    font-size:14px;
                                                "></i>
                                    @endif

                                </div>


                                <div style="
                                            min-width:0;
                                        ">

                                    <div style="
                                                display:flex;
                                                align-items:center;
                                                gap:6px;
                                            ">

                                        <p style="
                                                    margin:0;
                                                    font-size:13px;
                                                    line-height:1.4;
                                                    font-weight:600;
                                                    color:#111827;
                                                ">
                                            {{ ucfirst($social->platform) }}
                                        </p>

                                        @if($social->is_verified)

                                        <i class="fa-solid fa-circle-check" title="Verified" style="
                                                            font-size:10px;
                                                            color:#3b82f6;
                                                        "></i>

                                        @endif

                                    </div>

                                    <p style="
                                                margin:3px 0 0;
                                                font-size:11px;
                                                color:#9ca3af;
                                            ">
                                        Social profile
                                    </p>

                                </div>

                            </div>

                        </td>


                        {{-- Username --}}
                        <td style="
                                    padding:15px 18px;
                                    white-space:nowrap;
                                ">

                            @if($social->username)

                            <span style="
                                            font-size:13px;
                                            color:#374151;
                                        ">
                                {{ $social->username }}
                            </span>

                            @else

                            <span style="
                                            font-size:13px;
                                            color:#d1d5db;
                                        ">
                                —
                            </span>

                            @endif

                        </td>


                        {{-- URL --}}
                        <td style="
    padding:15px 18px;
    width:180px;
    min-width:180px;
    max-width:180px;
    box-sizing:border-box;
">
                            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                title="{{ $social->url }}" style="
            display:flex;
            align-items:center;
            gap:8px;
            width:100%;
            min-width:0;
            text-decoration:none;
            color:#6b7280;
            font-size:13px;
        ">
                                <span style="
            flex:1;
            min-width:0;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
        ">
                                    {{ $social->url }}
                                </span>

                                <i class="fa-solid fa-arrow-up-right-from-square"
                                    style="flex:0 0 auto;font-size:9px;color:#9ca3af;">
                                </i>
                            </a>
                        </td>


                        {{-- Label --}}
                        <td style="
    padding:15px 18px;
    vertical-align:middle;
    width:220px;
    min-width:220px;
    max-width:220px;
">
                            @if($social->label)

                            <div style="
            display:flex;
            align-items:flex-start;
            gap:7px;
            width:100%;
            max-height:46px;
            padding:6px 9px 6px 7px;
            border-radius:7px;
            background:#f8fafc;
            border:1px solid #e5e7eb;
            color:#4b5563;
            font-size:11px;
            font-weight:600;
            line-height:1.4;
            box-sizing:border-box;
            overflow:hidden;
        ">

                                <span style="
                width:20px;
                height:20px;
                flex:0 0 20px;
                display:flex;
                align-items:center;
                justify-content:center;
                border-radius:5px;
                background:#eef2ff;
                color:#6366f1;
            ">
                                    <i class="fa-solid fa-tag" style="font-size:8px;"></i>
                                </span>

                                <textarea readonly rows="2" style="
                    flex:1;
                    width:100%;
                    min-width:0;
                    height:34px;
                    min-height:34px;
                    max-height:60px;
                    padding:0;
                    margin:0;
                    border:0;
                    outline:0;
                    resize:vertical;
                    background:transparent;
                    color:#4b5563;
                    font-family:inherit;
                    font-size:11px;
                    font-weight:600;
                    line-height:1.4;
                    overflow:auto;
                ">{{ $social->label }}</textarea>

                            </div>

                            @else

                            <span style="
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width:24px;
            height:24px;
            border-radius:6px;
            background:#f9fafb;
            border:1px dashed #e5e7eb;
            color:#cbd5e1;
            font-size:11px;
        ">
                                —
                            </span>

                            @endif
                        </td>


                        {{-- Visibility --}}
                        <td style="
                                    padding:15px 18px;
                                    text-align:center;
                                    white-space:nowrap;
                                ">

                            @if($social->is_visible)

                            <span style="
                                            display:inline-flex;
                                            align-items:center;
                                            gap:6px;
                                            padding:6px 10px;
                                            border-radius:999px;
                                            background:#ecfdf5;
                                            color:#047857;
                                            border:1px solid #d1fae5;
                                            font-size:11px;
                                            font-weight:600;
                                            line-height:1;
                                        ">

                                <span style="
                                                width:6px;
                                                height:6px;
                                                border-radius:50%;
                                                background:#10b981;
                                            "></span>

                                Visible

                            </span>

                            @else

                            <span style="
                                            display:inline-flex;
                                            align-items:center;
                                            gap:6px;
                                            padding:6px 10px;
                                            border-radius:999px;
                                            background:#f3f4f6;
                                            color:#6b7280;
                                            border:1px solid #e5e7eb;
                                            font-size:11px;
                                            font-weight:600;
                                            line-height:1;
                                        ">

                                <span style="
                                                width:6px;
                                                height:6px;
                                                border-radius:50%;
                                                background:#9ca3af;
                                            "></span>

                                Hidden

                            </span>

                            @endif

                        </td>


                        {{-- Verification --}}
                        <td style="
                                    padding:15px 18px;
                                    text-align:center;
                                    white-space:nowrap;
                                ">

                            @if($social->is_verified)

                            <span style="
                                            display:inline-flex;
                                            align-items:center;
                                            gap:6px;
                                            padding:6px 10px;
                                            border-radius:999px;
                                            background:#eff6ff;
                                            color:#1d4ed8;
                                            border:1px solid #dbeafe;
                                            font-size:11px;
                                            font-weight:600;
                                            line-height:1;
                                        ">

                                <i class="fa-solid fa-circle-check" style="
                                                font-size:9px;
                                            "></i>

                                Verified

                            </span>

                            @else

                            <span style="
                                            display:inline-flex;
                                            align-items:center;
                                            gap:6px;
                                            padding:6px 10px;
                                            border-radius:999px;
                                            background:#fffbeb;
                                            color:#b45309;
                                            border:1px solid #fef3c7;
                                            font-size:11px;
                                            font-weight:600;
                                            line-height:1;
                                        ">

                                <i class="fa-solid fa-clock" style="
                                                font-size:9px;
                                            "></i>

                                Unverified

                            </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td style="
                                    padding:15px 18px;
                                    text-align:right;
                                    white-space:nowrap;
                                ">

                            <div style="
                                        display:inline-flex;
                                        align-items:center;
                                        gap:2px;
                                        padding:3px;
                                        border:1px solid #e5e7eb;
                                        border-radius:10px;
                                        background:#ffffff;
                                        box-shadow:0 1px 2px rgba(0,0,0,.03);
                                    ">

                                <button type="button" title="View" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#viewSocialModal{{ $social->id }}" style="
        width:32px;
        height:32px;
        padding:0;
        border:0;
        border-radius:7px;
        background:transparent;
        color:#9ca3af;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        font-size:11px;
    ">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button type="button" title="Edit" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#editSocialModal{{ $social->id }}" style="
        width:32px;
        height:32px;
        padding:0;
        border:0;
        border-radius:7px;
        background:transparent;
        color:#9ca3af;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        font-size:11px;
        transition:
            background-color .18s ease,
            color .18s ease;
    " onmouseover="
        this.style.backgroundColor='#f3f4f6';
        this.style.color='#4f46e5';
    " onmouseout="
        this.style.backgroundColor='transparent';
        this.style.color='#9ca3af';
    ">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button type="button" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteSocialModal" data-delete-id="{{ $social->id }}"
                                    data-delete-name="{{ ucfirst($social->platform) }}" class="delete-social-btn" style="
        width:32px;
        height:32px;
        padding:0;
        border:0;
        border-radius:7px;
        background:transparent;
        color:#9ca3af;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        font-size:11px;
    " onmouseover="
        this.style.backgroundColor='#fef2f2';
        this.style.color='#ef4444';
    " onmouseout="
        this.style.backgroundColor='transparent';
        this.style.color='#9ca3af';
    ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>

                        </td>

                    </tr>

                    @include('users.socials.partials._view', ['social' => $social])
                    @include('users.socials.partials._edit', ['social' => $social])
                    @include('users.socials.partials._delete', ['social' => $social])

                    @endforeach

                </tbody>

            </table>

        </div>


        @else

        {{-- ========================================================
        EMPTY STATE
        ======================================================== --}}
        <div style="
                padding:70px 24px;
                text-align:center;
                box-sizing:border-box;
            ">

            <div style="
                    width:60px;
                    height:60px;
                    margin:0 auto;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:16px;
                    border:1px solid #e5e7eb;
                    background:#f9fafb;
                    color:#9ca3af;
                    box-shadow:0 1px 2px rgba(0,0,0,.03);
                ">

                <i class="fa-solid fa-share-nodes" style="
                        font-size:20px;
                    "></i>

            </div>


            <h3 style="
                    margin:18px 0 0;
                    font-size:14px;
                    line-height:1.4;
                    font-weight:600;
                    color:#111827;
                ">
                No social profiles yet
            </h3>


            <p style="
                    max-width:420px;
                    margin:7px auto 0;
                    font-size:13px;
                    line-height:1.6;
                    color:#6b7280;
                ">
                Connect your social media profiles or personal website
                to make them available on your account.
            </p>


            <button type="button" onclick="openSocialModal()" style="
                        height:40px;
                        margin-top:22px;
                        padding:0 16px;
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:8px;
                        border:1px solid #4f46e5;
                        border-radius:10px;
                        background:#4f46e5;
                        color:#ffffff;
                        font-size:13px;
                        font-weight:500;
                        cursor:pointer;
                        box-shadow:0 1px 2px rgba(79,70,229,.15);
                    ">

                <i class="fa-solid fa-plus" style="
                        font-size:10px;
                    "></i>

                Add Social Link

            </button>

        </div>

        @endif

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

    const selectAll = document.getElementById('selectAllSocials');
    const checkboxes = document.querySelectorAll('.social-checkbox');
    const bulkActions = document.getElementById('socialBulkActions');
    const selectedCount = document.getElementById('selectedSocialCount');
    const deleteCount = document.getElementById('deleteSocialCount');
    const deleteInput = document.getElementById('deleteConfirmationInput');
    const confirmDelete = document.getElementById('confirmDeleteSocial');
    const bulkDelete = document.getElementById('bulkDeleteSocials');

    let deleteIds = [];

    function updateSelection() {
        const selected = [...checkboxes].filter(cb => cb.checked);

        selectedCount.textContent = selected.length;

        bulkActions.style.display = selected.length
            ? 'flex'
            : 'none';

        if (selectAll) {
            selectAll.checked =
                selected.length > 0 &&
                selected.length === checkboxes.length;

            selectAll.indeterminate =
                selected.length > 0 &&
                selected.length < checkboxes.length;
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });

            updateSelection();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateSelection);
    });

    document.querySelectorAll('.delete-social-btn').forEach(button => {

        button.addEventListener('click', function () {
            deleteIds = [this.dataset.deleteId];

            deleteCount.textContent = '1 social link';

            deleteInput.value = '';
            confirmDelete.disabled = true;
            confirmDelete.style.opacity = '.5';
            confirmDelete.style.cursor = 'not-allowed';
        });

    });

    if (bulkDelete) {
        bulkDelete.addEventListener('click', function () {

            deleteIds = [...checkboxes]
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            const count = deleteIds.length;

            deleteCount.textContent =
                count + (count === 1 ? ' social link' : ' social links');

            deleteInput.value = '';
            confirmDelete.disabled = true;
            confirmDelete.style.opacity = '.5';
            confirmDelete.style.cursor = 'not-allowed';
        });
    }

    deleteInput.addEventListener('input', function () {

        const valid = this.value === 'DELETE';

        confirmDelete.disabled = !valid;
        confirmDelete.style.opacity = valid ? '1' : '.5';
        confirmDelete.style.cursor = valid ? 'pointer' : 'not-allowed';
    });

    confirmDelete.addEventListener('click', function () {

        if (deleteInput.value !== 'DELETE' || !deleteIds.length) {
            return;
        }

        const form = document.createElement('form');

        form.method = 'POST';
        form.action = '{{ route('socials.destroy') }}';

        form.innerHTML = `
            @csrf
            @method('DELETE')
        `;

        deleteIds.forEach(id => {
            const input = document.createElement('input');

            input.type = 'hidden';
            input.name = 'ids[]';
            input.value = id;

            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    });

});
    </script>
</section>
