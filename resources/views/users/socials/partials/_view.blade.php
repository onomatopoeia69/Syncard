<div class="modal fade" id="viewSocialModal{{ $social->id }}" tabindex="-1"
    aria-labelledby="viewSocialModalLabel{{ $social->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="
            max-width:560px;
            width:calc(100% - 30px);
        ">
        <div class="modal-content" style="
                border:1px solid rgba(229,231,235,.8);
                border-radius:20px;
                overflow:hidden;
                background:#ffffff;
                box-shadow:0 30px 80px rgba(15,23,42,.18);
            ">

            {{-- HEADER --}}
            <div class="modal-header" style="
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:20px;
        width:100%;
        box-sizing:border-box;
        padding:20px 22px;
        border-bottom:1px solid #f1f5f9;
        background:linear-gradient(180deg,#ffffff 0%,#fafbff 100%);
    ">
                {{-- LEFT CONTENT --}}
                <div style="
            display:flex;
            align-items:center;
            gap:13px;
            min-width:0;
            flex:1 1 auto;
        ">
                    {{-- PLATFORM ICON --}}
                    <div style="
                width:46px;
                height:46px;
                flex:0 0 46px;
                display:flex;
                align-items:center;
                justify-content:center;
                border-radius:13px;
                background:linear-gradient(135deg,#eef2ff,#e0e7ff);
                border:1px solid #e0e7ff;
                color:#4f46e5;
                box-shadow:0 4px 12px rgba(79,70,229,.08);
            ">
                        <i class="{{ $social->icon ?: 'fa-solid fa-link' }}" style="font-size:17px;"></i>
                    </div>


                    {{-- TITLE CONTENT --}}
                    <div style="
                min-width:0;
                flex:1 1 auto;
            ">
                        <div style="
                    display:flex;
                    align-items:center;
                    gap:8px;
                    min-width:0;
                    margin-bottom:3px;
                ">
                            <h5 id="viewSocialModalLabel{{ $social->id }}" style="
                        min-width:0;
                        margin:0;
                        padding:0;
                        font-size:16px;
                        line-height:1.3;
                        font-weight:700;
                        letter-spacing:-.01em;
                        color:#111827;
                        white-space:nowrap;
                        overflow:hidden;
                        text-overflow:ellipsis;
                    ">
                                {{ ucfirst($social->platform) }}
                            </h5>

                            @if($social->is_verified)
                            <span style="
                            display:inline-flex;
                            align-items:center;
                            gap:4px;
                            flex:0 0 auto;
                            padding:3px 7px;
                            border-radius:999px;
                            background:#eff6ff;
                            border:1px solid #dbeafe;
                            color:#2563eb;
                            font-size:9px;
                            font-weight:700;
                            line-height:1;
                            text-transform:uppercase;
                            letter-spacing:.03em;
                        ">
                                <i class="fa-solid fa-circle-check" style="font-size:8px;"></i>
                                Verified
                            </span>
                            @endif
                        </div>

                        <div style="
                    max-width:100%;
                    font-size:11px;
                    line-height:1.4;
                    color:#9ca3af;
                    white-space:nowrap;
                    overflow:hidden;
                    text-overflow:ellipsis;
                ">
                            Social profile details
                        </div>
                    </div>
                </div>


                {{-- CLOSE BUTTON --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
            width:34px;
            height:34px;
            flex:0 0 34px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0;
            padding:0;
            border:0;
            border-radius:50%;
            background-color:transparent;
            opacity:.55;
            box-shadow:none;
            transition:
                background-color .18s ease,
                opacity .18s ease,
                transform .18s ease,
                box-shadow .18s ease;
        " onmouseover="
            this.style.backgroundColor='#f3f4f6';
            this.style.opacity='1';
            this.style.transform='rotate(90deg)';
        " onmouseout="
            this.style.backgroundColor='transparent';
            this.style.opacity='.55';
            this.style.transform='rotate(0deg)';
        " onfocus="
            this.style.backgroundColor='#f3f4f6';
            this.style.opacity='1';
            this.style.boxShadow='0 0 0 3px rgba(79,70,229,.12)';
        " onblur="
            this.style.backgroundColor='transparent';
            this.style.opacity='.55';
            this.style.boxShadow='none';
        "></button>
            </div>


            {{-- BODY --}}
            <div class="modal-body" style="
                    padding:24px;
                    background:#ffffff;
                ">

                {{-- ACCOUNT INFORMATION --}}
                <div style="
                        margin-bottom:20px;
                        padding:17px;
                        border:1px solid #eef0f4;
                        border-radius:14px;
                        background:#fafbfc;
                    ">
                    <div style="
                            display:flex;
                            align-items:center;
                            gap:8px;
                            margin-bottom:14px;
                        ">
                        <i class="fa-solid fa-user-circle" style="
                                font-size:13px;
                                color:#6366f1;
                            "></i>

                        <span style="
                                font-size:11px;
                                font-weight:700;
                                color:#6b7280;
                                text-transform:uppercase;
                                letter-spacing:.07em;
                            ">
                            Account Information
                        </span>
                    </div>

                    <div style="
                            display:grid;
                            grid-template-columns:1fr 1fr;
                            gap:18px;
                        ">
                        {{-- Username --}}
                        <div style="min-width:0;">
                            <div style="
                                    margin-bottom:5px;
                                    font-size:10px;
                                    font-weight:600;
                                    color:#9ca3af;
                                    text-transform:uppercase;
                                    letter-spacing:.05em;
                                ">
                                Username
                            </div>

                            <div style="
                                    font-size:14px;
                                    font-weight:600;
                                    color:#374151;
                                    overflow:hidden;
                                    text-overflow:ellipsis;
                                    white-space:nowrap;
                                ">
                                {{ $social->username ?: 'Not provided' }}
                            </div>
                        </div>

                        {{-- Display Label --}}
                        <div style="min-width:0;">
                            <div style="
                                    margin-bottom:5px;
                                    font-size:10px;
                                    font-weight:600;
                                    color:#9ca3af;
                                    text-transform:uppercase;
                                    letter-spacing:.05em;
                                ">
                                Display Label
                            </div>

                            <div style="
                                    font-size:14px;
                                    font-weight:600;
                                    color:#374151;
                                    overflow:hidden;
                                    text-overflow:ellipsis;
                                    white-space:nowrap;
                                ">
                                {{ $social->label ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- PROFILE URL --}}
                <div style="
                        margin-bottom:20px;
                        padding:17px;
                        border:1px solid #eef0f4;
                        border-radius:14px;
                        background:#ffffff;
                    ">
                    <div style="
                            display:flex;
                            align-items:center;
                            gap:8px;
                            margin-bottom:10px;
                        ">
                        <i class="fa-solid fa-link" style="
                                font-size:12px;
                                color:#6366f1;
                            "></i>

                        <span style="
                                font-size:11px;
                                font-weight:700;
                                color:#6b7280;
                                text-transform:uppercase;
                                letter-spacing:.07em;
                            ">
                            Profile URL
                        </span>
                    </div>

                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer" style="
                            display:flex;
                            align-items:center;
                            gap:10px;
                            width:100%;
                            padding:11px 12px;
                            box-sizing:border-box;
                            border:1px solid #e5e7eb;
                            border-radius:10px;
                            background:#f9fafb;
                            color:#4f46e5;
                            font-size:12px;
                            font-weight:500;
                            text-decoration:none;
                            transition:
                                background-color .18s ease,
                                border-color .18s ease,
                                color .18s ease;
                        " onmouseover="
                            this.style.backgroundColor='#eef2ff';
                            this.style.borderColor='#c7d2fe';
                            this.style.color='#4338ca';
                        " onmouseout="
                            this.style.backgroundColor='#f9fafb';
                            this.style.borderColor='#e5e7eb';
                            this.style.color='#4f46e5';
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

                        <i class="fa-solid fa-arrow-up-right-from-square" style="
                                flex:0 0 auto;
                                font-size:10px;
                                color:#818cf8;
                            "></i>
                    </a>
                </div>


                {{-- STATUS --}}
                <div style="
                        display:grid;
                        grid-template-columns:1fr 1fr;
                        gap:12px;
                    ">

                    {{-- Visibility --}}
                    <div style="
                            padding:15px;
                            border:1px solid #eef0f4;
                            border-radius:14px;
                            background:#fafbfc;
                        ">
                        <div style="
                                display:flex;
                                align-items:center;
                                gap:7px;
                                margin-bottom:9px;
                            ">
                            <i class="fa-solid fa-eye" style="
                                    font-size:10px;
                                    color:#9ca3af;
                                "></i>

                            <span style="
                                    font-size:10px;
                                    font-weight:700;
                                    color:#9ca3af;
                                    text-transform:uppercase;
                                    letter-spacing:.06em;
                                ">
                                Visibility
                            </span>
                        </div>

                        @if($social->is_visible)
                        <span style="
                                    display:inline-flex;
                                    align-items:center;
                                    gap:6px;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#047857;
                                ">
                            <span style="
                                        width:7px;
                                        height:7px;
                                        border-radius:50%;
                                        background:#10b981;
                                        box-shadow:0 0 0 3px #d1fae5;
                                    "></span>
                            Visible
                        </span>
                        @else
                        <span style="
                                    display:inline-flex;
                                    align-items:center;
                                    gap:6px;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#6b7280;
                                ">
                            <span style="
                                        width:7px;
                                        height:7px;
                                        border-radius:50%;
                                        background:#9ca3af;
                                    "></span>
                            Hidden
                        </span>
                        @endif
                    </div>


                    {{-- Verification --}}
                    <div style="
                            padding:15px;
                            border:1px solid #eef0f4;
                            border-radius:14px;
                            background:#fafbfc;
                        ">
                        <div style="
                                display:flex;
                                align-items:center;
                                gap:7px;
                                margin-bottom:9px;
                            ">
                            <i class="fa-solid fa-shield-check" style="
                                    font-size:10px;
                                    color:#9ca3af;
                                "></i>

                            <span style="
                                    font-size:10px;
                                    font-weight:700;
                                    color:#9ca3af;
                                    text-transform:uppercase;
                                    letter-spacing:.06em;
                                ">
                                Verification
                            </span>
                        </div>

                        @if($social->is_verified)
                        <span style="
                                    display:inline-flex;
                                    align-items:center;
                                    gap:6px;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#2563eb;
                                ">
                            <i class="fa-solid fa-circle-check" style="font-size:11px;"></i>
                            Verified
                        </span>
                        @else
                        <span style="
                                    display:inline-flex;
                                    align-items:center;
                                    gap:6px;
                                    font-size:13px;
                                    font-weight:600;
                                    color:#b45309;
                                ">
                            <i class="fa-solid fa-clock" style="font-size:11px;"></i>
                            Not verified
                        </span>
                        @endif
                    </div>

                </div>

                {{-- RECORD META --}}
                <div style="
                        display:flex;
                        align-items:center;
                        justify-content:space-between;
                        gap:12px;
                        margin-top:20px;
                        padding-top:15px;
                        border-top:1px solid #f1f5f9;
                        font-size:10px;
                        color:#9ca3af;
                    ">
                    <span>
                        Social ID #{{ $social->id }}
                    </span>

                    @if($social->created_at)
                    <span>
                        Added {{ $social->created_at->format('M d, Y') }}
                    </span>
                    @endif
                </div>

            </div>


            {{-- FOOTER --}}
            <div class="modal-footer" style="
                    display:flex;
                    align-items:center;
                    justify-content:flex-end;
                    gap:8px;
                    padding:16px 24px;
                    border-top:1px solid #f1f5f9;
                    background:#fafbfc;
                ">
                <button type="button" data-bs-dismiss="modal" style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        min-width:82px;
                        height:36px;
                        padding:0 15px;
                        border:1px solid #e5e7eb;
                        border-radius:9px;
                        background:#ffffff;
                        color:#374151;
                        font-size:12px;
                        font-weight:600;
                        cursor:pointer;
                        box-shadow:0 1px 2px rgba(0,0,0,.04);
                        transition:
                            background-color .18s ease,
                            border-color .18s ease,
                            box-shadow .18s ease,
                            transform .18s ease;
                    " onmouseover="
                        this.style.backgroundColor='#f9fafb';
                        this.style.borderColor='#d1d5db';
                        this.style.boxShadow='0 3px 8px rgba(0,0,0,.06)';
                        this.style.transform='translateY(-1px)';
                    " onmouseout="
                        this.style.backgroundColor='#ffffff';
                        this.style.borderColor='#e5e7eb';
                        this.style.boxShadow='0 1px 2px rgba(0,0,0,.04)';
                        this.style.transform='translateY(0)';
                    " onfocus="
                        this.style.outline='none';
                        this.style.boxShadow='0 0 0 3px rgba(79,70,229,.12)';
                    " onblur="
                        this.style.boxShadow='0 1px 2px rgba(0,0,0,.04)';
                    ">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
