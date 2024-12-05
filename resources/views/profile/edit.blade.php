<x-header></x-header>
<x-app-layout>
    <section class="relative h-[50vh] bg-cover bg-center"
        style="background-image: url(' {{ asset('asset-views/img/hero-bg.jpg') }} ')">
        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center">
            <h1 class="text-white text-4xl font-bold"><span>Profile</h1>
            <p class="text-white cursor-pointer">Back / <span class="text-rose-400 hover:underline"><a
                        href="/home">Home</a></span></p>
        </div>
    </section>v
    <div class="py-[100px] px-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.logout-partial')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer></x-footer>

<x-icon-j-s></x-icon-j-s>
