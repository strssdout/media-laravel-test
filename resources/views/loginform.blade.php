<html>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="antialiased hidden fixed top-0 right-0 px-6 py-4 sm:block" style="text-align: right;">
                @auth
                    <a href="{{ url('/dashboard') }}" style = "margin-left: 1rem; font-size: 0.875rem; line-height: 1.25rem; --tw-text-opacity: 1; color: rgba(55, 65, 81, var(--tw-text-opacity)); text-decoration: underline;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" style = "margin-left: 1rem; font-size: 0.875rem; line-height: 1.25rem; --tw-text-opacity: 1; color: rgba(55, 65, 81, var(--tw-text-opacity)); text-decoration: underline;">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" style = "margin-left: 1rem; font-size: 0.875rem; line-height: 1.25rem; --tw-text-opacity: 1; color: rgba(55, 65, 81, var(--tw-text-opacity)); text-decoration: underline;">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</html>
