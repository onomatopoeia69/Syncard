<div
    class="modal fade"
    id="deleteSocialModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered"
        style="max-width:460px;"
    >
        <div
            class="modal-content"
            style="
                border:0;
                border-radius:14px;
                overflow:hidden;
                box-shadow:0 20px 50px rgba(0,0,0,.15);
            "
        >

            {{-- HEADER --}}
            <div style="
                display:flex;
                align-items:center;
                gap:13px;
                padding:20px 22px;
                border-bottom:1px solid #f1f5f9;
            ">

                <div style="
                    width:42px;
                    height:42px;
                    flex:0 0 42px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:11px;
                    background:#fef2f2;
                    color:#ef4444;
                ">
                    <i class="fa-solid fa-trash" style="font-size:15px;"></i>
                </div>

                <div style="flex:1;">
                    <h5 style="
                        margin:0 0 3px;
                        font-size:16px;
                        font-weight:700;
                        color:#111827;
                    ">
                        Delete Social Link
                    </h5>

                    <div style="
                        font-size:11px;
                        color:#9ca3af;
                    ">
                        This action cannot be undone.
                    </div>
                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>

            {{-- BODY --}}
            <div style="padding:22px;">

                <div style="
                    padding:13px 14px;
                    margin-bottom:18px;
                    border:1px solid #fee2e2;
                    border-radius:9px;
                    background:#fffafa;
                    color:#6b7280;
                    font-size:12px;
                    line-height:1.5;
                ">
                    <i
                        class="fa-solid fa-triangle-exclamation"
                        style="color:#ef4444;margin-right:6px;"
                    ></i>

                    You are about to permanently delete
                    <strong id="deleteSocialCount" style="color:#111827;">
                        1 social link
                    </strong>.
                </div>

                <label style="
                    display:block;
                    margin-bottom:7px;
                    font-size:12px;
                    font-weight:600;
                    color:#374151;
                ">
                    Type <span style="color:#ef4444;">DELETE</span> to confirm
                </label>

                <input
                    type="text"
                    id="deleteConfirmationInput"
                    autocomplete="off"
                    placeholder="Type DELETE"
                    style="
                        width:100%;
                        height:42px;
                        padding:0 12px;
                        border:1px solid #d1d5db;
                        border-radius:8px;
                        outline:none;
                        font-size:13px;
                        color:#111827;
                        box-sizing:border-box;
                    "
                    oninput="
                        const valid = this.value === 'DELETE';
                        document.getElementById('confirmDeleteSocial').disabled = !valid;
                        this.style.borderColor = valid ? '#10b981' : '#d1d5db';
                    "
                >

                <div style="
                    margin-top:7px;
                    font-size:10px;
                    color:#9ca3af;
                ">
                    The confirmation is case-sensitive.
                </div>

            </div>

            {{-- FOOTER --}}
            <div style="
                display:flex;
                justify-content:flex-end;
                gap:8px;
                padding:14px 22px;
                border-top:1px solid #f1f5f9;
                background:#fafafa;
            ">

                <button
                    type="button"
                    data-bs-dismiss="modal"
                    style="
                        height:36px;
                        padding:0 15px;
                        border:1px solid #e5e7eb;
                        border-radius:7px;
                        background:#ffffff;
                        color:#6b7280;
                        font-size:12px;
                        font-weight:600;
                        cursor:pointer;
                    "
                >
                    Cancel
                </button>

                <button
                    type="button"
                    id="confirmDeleteSocial"
                    disabled
                    style="
                        height:36px;
                        padding:0 16px;
                        border:0;
                        border-radius:7px;
                        background:#ef4444;
                        color:#ffffff;
                        font-size:12px;
                        font-weight:600;
                        cursor:not-allowed;
                        opacity:.5;
                    "
                >
                    <i class="fa-solid fa-trash" style="margin-right:5px;"></i>
                    Delete
                </button>

            </div>

        </div>
    </div>
</div>
