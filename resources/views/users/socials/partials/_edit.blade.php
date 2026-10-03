<div class="modal fade" id="editSocialModal{{ $social->id }}" tabindex="-1"
    aria-labelledby="editSocialModalLabel{{ $social->id }}" aria-hidden="true">
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
                {{-- LEFT SIDE --}}
                <div style="
            display:flex;
            align-items:center;
            gap:13px;
            min-width:0;
            flex:1 1 auto;
        ">
                    {{-- ICON --}}
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

                    {{-- TITLE --}}
                    <div style="
                min-width:0;
                flex:1 1 auto;
            ">
                        <h5 id="editSocialModalLabel{{ $social->id }}" style="
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
                            Edit Social Link
                        </h5>

                        <div style="
                    margin-top:4px;
                    font-size:11px;
                    line-height:1.4;
                    color:#9ca3af;
                    white-space:nowrap;
                    overflow:hidden;
                    text-overflow:ellipsis;
                ">
                            Update your {{ ucfirst($social->platform) }} profile
                        </div>
                    </div>
                </div>


                {{-- RIGHT SIDE / CLOSE --}}
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


            {{-- FORM --}}
            <form method="POST" action="{{ route('socials.update', $social->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-body" style="
                        padding:24px;
                        background:#ffffff;
                    ">

                    {{-- PLATFORM --}}
                    <div style="margin-bottom:18px;">
                        <label for="platform{{ $social->id }}" style="
                                display:block;
                                margin-bottom:7px;
                                font-size:11px;
                                font-weight:700;
                                color:#6b7280;
                                text-transform:uppercase;
                                letter-spacing:.06em;
                            ">
                            Platform
                        </label>

                        <select id="platform{{ $social->id }}" name="platform" required style="
                                width:100%;
                                height:42px;
                                padding:0 12px;
                                border:1px solid #e5e7eb;
                                border-radius:10px;
                                background:#ffffff;
                                color:#374151;
                                font-size:13px;
                                outline:none;
                                box-sizing:border-box;
                                transition:
                                    border-color .18s ease,
                                    box-shadow .18s ease;
                            " onfocus="
                                this.style.borderColor='#a5b4fc';
                                this.style.boxShadow='0 0 0 3px rgba(99,102,241,.10)';
                            " onblur="
                                this.style.borderColor='#e5e7eb';
                                this.style.boxShadow='none';
                            ">
                            @foreach([
                            'linkedin',
                            'github',
                            'twitter',
                            'facebook',
                            'instagram',
                            'youtube',
                            'tiktok',
                            'discord',
                            'telegram',
                            'reddit',
                            'twitch',
                            'snapchat',
                            'pinterest',
                            'threads',
                            'website',
                            'other'
                            ] as $platform)
                            <option value="{{ $platform }}" {{ $social->platform === $platform ? 'selected' : '' }}
                                >
                                {{ ucfirst($platform) }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    {{-- TWO COLUMN --}}
                    <div style="
                            display:grid;
                            grid-template-columns:1fr 1fr;
                            gap:14px;
                            margin-bottom:18px;
                        ">

                        {{-- USERNAME --}}
                        <div>
                            <label for="username{{ $social->id }}" style="
                                    display:block;
                                    margin-bottom:7px;
                                    font-size:11px;
                                    font-weight:700;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.06em;
                                ">
                                Username
                            </label>

                            <input type="text" id="username{{ $social->id }}" name="username"
                                value="{{ old('username', $social->username) }}" placeholder="@username" style="
                                    width:100%;
                                    height:42px;
                                    padding:0 12px;
                                    border:1px solid #e5e7eb;
                                    border-radius:10px;
                                    background:#ffffff;
                                    color:#374151;
                                    font-size:13px;
                                    outline:none;
                                    box-sizing:border-box;
                                    transition:
                                        border-color .18s ease,
                                        box-shadow .18s ease;
                                " onfocus="
                                    this.style.borderColor='#a5b4fc';
                                    this.style.boxShadow='0 0 0 3px rgba(99,102,241,.10)';
                                " onblur="
                                    this.style.borderColor='#e5e7eb';
                                    this.style.boxShadow='none';
                                ">
                        </div>


                        {{-- LABEL --}}
                        <div>
                            <label for="label{{ $social->id }}" style="
                                    display:block;
                                    margin-bottom:7px;
                                    font-size:11px;
                                    font-weight:700;
                                    color:#6b7280;
                                    text-transform:uppercase;
                                    letter-spacing:.06em;
                                ">
                                Display Label
                            </label>

                            <input type="text" id="label{{ $social->id }}" name="label"
                                value="{{ old('label', $social->label) }}" placeholder="Personal, Work, etc." style="
                                    width:100%;
                                    height:42px;
                                    padding:0 12px;
                                    border:1px solid #e5e7eb;
                                    border-radius:10px;
                                    background:#ffffff;
                                    color:#374151;
                                    font-size:13px;
                                    outline:none;
                                    box-sizing:border-box;
                                    transition:
                                        border-color .18s ease,
                                        box-shadow .18s ease;
                                " onfocus="
                                    this.style.borderColor='#a5b4fc';
                                    this.style.boxShadow='0 0 0 3px rgba(99,102,241,.10)';
                                " onblur="
                                    this.style.borderColor='#e5e7eb';
                                    this.style.boxShadow='none';
                                ">
                        </div>

                    </div>


                    {{-- URL --}}
                    <div style="margin-bottom:18px;">
                        <label for="url{{ $social->id }}" style="
                                display:block;
                                margin-bottom:7px;
                                font-size:11px;
                                font-weight:700;
                                color:#6b7280;
                                text-transform:uppercase;
                                letter-spacing:.06em;
                            ">
                            Profile URL
                        </label>

                        <div style="position:relative;">
                            <i class="fa-solid fa-link" style="
                                    position:absolute;
                                    left:13px;
                                    top:50%;
                                    transform:translateY(-50%);
                                    font-size:11px;
                                    color:#9ca3af;
                                    pointer-events:none;
                                "></i>

                            <input type="url" id="url{{ $social->id }}" name="url"
                                value="{{ old('url', $social->url) }}" placeholder="https://..." required style="
                                    width:100%;
                                    height:42px;
                                    padding:0 12px 0 35px;
                                    border:1px solid #e5e7eb;
                                    border-radius:10px;
                                    background:#ffffff;
                                    color:#374151;
                                    font-size:13px;
                                    outline:none;
                                    box-sizing:border-box;
                                    transition:
                                        border-color .18s ease,
                                        box-shadow .18s ease;
                                " onfocus="
                                    this.style.borderColor='#a5b4fc';
                                    this.style.boxShadow='0 0 0 3px rgba(99,102,241,.10)';
                                " onblur="
                                    this.style.borderColor='#e5e7eb';
                                    this.style.boxShadow='none';
                                ">
                        </div>
                    </div>


                    {{-- ICON --}}
                    <div style="margin-bottom:20px;">
                        <label for="icon{{ $social->id }}" style="
                                display:block;
                                margin-bottom:7px;
                                font-size:11px;
                                font-weight:700;
                                color:#6b7280;
                                text-transform:uppercase;
                                letter-spacing:.06em;
                            ">
                            Icon Class
                        </label>

                        <input type="text" id="icon{{ $social->id }}" name="icon"
                            value="{{ old('icon', $social->icon) }}" placeholder="fa-brands fa-github" style="
                                width:100%;
                                height:42px;
                                padding:0 12px;
                                border:1px solid #e5e7eb;
                                border-radius:10px;
                                background:#ffffff;
                                color:#374151;
                                font-size:13px;
                                outline:none;
                                box-sizing:border-box;
                                transition:
                                    border-color .18s ease,
                                    box-shadow .18s ease;
                            " onfocus="
                                this.style.borderColor='#a5b4fc';
                                this.style.boxShadow='0 0 0 3px rgba(99,102,241,.10)';
                            " onblur="
                                this.style.borderColor='#e5e7eb';
                                this.style.boxShadow='none';
                            ">

                        <div style="
                                margin-top:6px;
                                font-size:10px;
                                color:#9ca3af;
                            ">
                            Example: <span style="font-family:monospace;">fa-brands fa-github</span>
                        </div>
                    </div>


                    {{-- CURRENT STATUS --}}
                    <div style="
                            display:grid;
                            grid-template-columns:1fr 1fr;
                            gap:12px;
                            padding-top:18px;
                            border-top:1px solid #f1f5f9;
                        ">

                        {{-- Visibility --}}
                        <div style="
                                display:flex;
                                align-items:center;
                                justify-content:space-between;
                                gap:10px;
                                padding:12px 14px;
                                border:1px solid #eef0f4;
                                border-radius:11px;
                                background:#fafbfc;
                            ">
                            <div>
                                <div style="
                                        font-size:11px;
                                        font-weight:600;
                                        color:#374151;
                                    ">
                                    Visible
                                </div>

                                <div style="
                                        margin-top:2px;
                                        font-size:10px;
                                        color:#9ca3af;
                                    ">
                                    Show publicly
                                </div>
                            </div>

                            <input type="checkbox" name="is_visible" value="1" {{ $social->is_visible ? 'checked' : ''
                            }}
                            style="
                            width:17px;
                            height:17px;
                            accent-color:#4f46e5;
                            cursor:pointer;
                            "
                            >
                        </div>


                        {{-- Verification --}}
                        <div style="
                                display:flex;
                                align-items:center;
                                gap:10px;
                                padding:12px 14px;
                                border:1px solid #eef0f4;
                                border-radius:11px;
                                background:#fafbfc;
                            ">
                            <div style="
                                    width:30px;
                                    height:30px;
                                    flex:0 0 30px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    border-radius:8px;
                                    background:#eff6ff;
                                    color:#2563eb;
                                ">
                                <i class="fa-solid fa-shield-check" style="font-size:11px;"></i>
                            </div>

                            <div>
                                <div style="
                                        font-size:11px;
                                        font-weight:600;
                                        color:#374151;
                                    ">
                                    Verification
                                </div>

                                <div style="
                                        margin-top:2px;
                                        font-size:10px;
                                        color:#9ca3af;
                                    ">
                                    {{ $social->is_verified ? 'Verified account' : 'Not verified' }}
                                </div>
                            </div>
                        </div>

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
                        ">
                        Cancel
                    </button>

                    <button type="submit" style="
                            min-width:110px;
                            height:36px;
                            padding:0 16px;
                            border:1px solid #4f46e5;
                            border-radius:9px;
                            background:#4f46e5;
                            color:#ffffff;
                            font-size:12px;
                            font-weight:600;
                            cursor:pointer;
                            box-shadow:0 3px 8px rgba(79,70,229,.18);
                        ">
                        <i class="fa-solid fa-check" style="
                                margin-right:6px;
                                font-size:10px;
                            "></i>
                        Save Changes
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
