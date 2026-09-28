@if (session('success'))
    <div id="successNotification"
        class="fixed top-5 right-5 z-[9999] w-[360px] max-w-[calc(100%-40px)]">

        <div class="flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800 shadow-lg">

            <div class="mt-0.5">
                <i class="fas fa-circle-check"></i>
            </div>

            <div class="flex-1">
                <p class="font-semibold">Success</p>
                <p class="mt-1 text-sm">
                    {{ session('success') }}
                </p>
            </div>

            <button type="button"
                class="text-green-600 hover:text-green-800"
                onclick="document.getElementById('successNotification').remove()">
                <i class="fas fa-xmark"></i>
            </button>

        </div>
    </div>
@endif


@if (session('error'))
    <div id="errorNotification"
        class="fixed top-5 right-5 z-[9999] w-[360px] max-w-[calc(100%-40px)]">

        <div class="flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800 shadow-lg">

            <div class="mt-0.5">
                <i class="fas fa-circle-exclamation"></i>
            </div>

            <div class="flex-1">
                <p class="font-semibold">Error</p>
                <p class="mt-1 text-sm">
                    {{ session('error') }}
                </p>
            </div>

            <button type="button"
                class="text-red-600 hover:text-red-800"
                onclick="document.getElementById('errorNotification').remove()">
                <i class="fas fa-xmark"></i>
            </button>

        </div>
    </div>
@endif


@if ($errors->any())
    <div id="validationNotification"
        class="fixed top-5 right-5 z-[9999] w-[360px] max-w-[calc(100%-40px)]">

        <div class="flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800 shadow-lg">

            <div class="mt-0.5">
                <i class="fas fa-circle-exclamation"></i>
            </div>

            <div class="flex-1">

                <p class="font-semibold">
                    Please fix the following:
                </p>

                <ul class="mt-2 space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>
                            • {{ $error }}
                        </li>
                    @endforeach
                </ul>

            </div>

            <button type="button"
                class="text-red-600 hover:text-red-800"
                onclick="document.getElementById('validationNotification').remove()">
                <i class="fas fa-xmark"></i>
            </button>

        </div>
    </div>
@endif


@if (session('success') || session('error') || $errors->any())
<script>
    setTimeout(function () {

        const notifications = [
            document.getElementById('successNotification'),
            document.getElementById('errorNotification'),
            document.getElementById('validationNotification')
        ];

        notifications.forEach(function (notification) {

            if (!notification) {
                return;
            }

            notification.style.opacity = '0';
            notification.style.transform = 'translateX(20px)';
            notification.style.transition =
                'opacity .25s ease, transform .25s ease';

            setTimeout(function () {
                notification.remove();
            }, 250);

        });

    }, 4000);
</script>
@endif
