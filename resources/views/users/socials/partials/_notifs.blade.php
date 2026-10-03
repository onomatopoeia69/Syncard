@if(session('success') || session('error'))
    <div
        style="
            position:fixed;
            top:20px;
            right:20px;
            z-index:9999;
            width:360px;
            max-width:calc(100% - 40px);
        "
    >
        @if(session('success'))
            <div
                id="successNotification"
                style="
                    display:flex;
                    align-items:flex-start;
                    gap:12px;
                    padding:14px 16px;
                    background:#ffffff;
                    border:1px solid #d1fae5;
                    border-left:4px solid #10b981;
                    border-radius:10px;
                    box-shadow:0 10px 30px rgba(0,0,0,.10);
                "
            >
                <div
                    style="
                        width:32px;
                        height:32px;
                        flex:0 0 32px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border-radius:50%;
                        background:#ecfdf5;
                        color:#10b981;
                    "
                >
                    <i class="fa-solid fa-check" style="font-size:13px;"></i>
                </div>

                <div style="flex:1;min-width:0;">
                    <div
                        style="
                            margin:0 0 3px;
                            font-size:13px;
                            font-weight:700;
                            color:#111827;
                        "
                    >
                        Success
                    </div>

                    <div
                        style="
                            font-size:12px;
                            line-height:1.5;
                            color:#6b7280;
                        "
                    >
                        {{ session('success') }}
                    </div>
                </div>

                <button
                    type="button"
                    onclick="this.closest('#successNotification').remove()"
                    style="
                        width:24px;
                        height:24px;
                        padding:0;
                        border:0;
                        background:transparent;
                        color:#9ca3af;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        cursor:pointer;
                        border-radius:6px;
                    "
                    onmouseover="this.style.backgroundColor='#f3f4f6';this.style.color='#374151';"
                    onmouseout="this.style.backgroundColor='transparent';this.style.color='#9ca3af';"
                >
                    <i class="fa-solid fa-xmark" style="font-size:12px;"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div
                id="errorNotification"
                style="
                    display:flex;
                    align-items:flex-start;
                    gap:12px;
                    padding:14px 16px;
                    background:#ffffff;
                    border:1px solid #fee2e2;
                    border-left:4px solid #ef4444;
                    border-radius:10px;
                    box-shadow:0 10px 30px rgba(0,0,0,.10);
                "
            >
                <div
                    style="
                        width:32px;
                        height:32px;
                        flex:0 0 32px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border-radius:50%;
                        background:#fef2f2;
                        color:#ef4444;
                    "
                >
                    <i class="fa-solid fa-xmark" style="font-size:13px;"></i>
                </div>

                <div style="flex:1;min-width:0;">
                    <div
                        style="
                            margin:0 0 3px;
                            font-size:13px;
                            font-weight:700;
                            color:#111827;
                        "
                    >
                        Error
                    </div>

                    <div
                        style="
                            font-size:12px;
                            line-height:1.5;
                            color:#6b7280;
                        "
                    >
                        {{ session('error') }}
                    </div>
                </div>

                <button
                    type="button"
                    onclick="this.closest('#errorNotification').remove()"
                    style="
                        width:24px;
                        height:24px;
                        padding:0;
                        border:0;
                        background:transparent;
                        color:#9ca3af;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        cursor:pointer;
                        border-radius:6px;
                    "
                    onmouseover="this.style.backgroundColor='#f3f4f6';this.style.color='#374151';"
                    onmouseout="this.style.backgroundColor='transparent';this.style.color='#9ca3af';"
                >
                    <i class="fa-solid fa-xmark" style="font-size:12px;"></i>
                </button>
            </div>
        @endif
    </div>

    <script>
        setTimeout(function () {
            const success = document.getElementById('successNotification');
            const error = document.getElementById('errorNotification');

            if (success) {
                success.style.opacity = '0';
                success.style.transform = 'translateX(20px)';
                success.style.transition = 'opacity .25s ease, transform .25s ease';

                setTimeout(function () {
                    success.remove();
                }, 250);
            }

            if (error) {
                error.style.opacity = '0';
                error.style.transform = 'translateX(20px)';
                error.style.transition = 'opacity .25s ease, transform .25s ease';

                setTimeout(function () {
                    error.remove();
                }, 250);
            }
        }, 4000);
    </script>
@endif
