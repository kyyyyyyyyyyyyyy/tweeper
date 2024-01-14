<x-app-layout>
    <style>
        .profile-header {
            background-color: #1da1f2;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #ffffff;
            margin-top: -75px;
        }

        .profile-info {
            text-align: center;
            padding: 20px;
        }

        .profile-info h1 {
            margin: 0;
            font-size: 24px;
        }

        .profile-info p {
            margin: 10px 0;
            font-size: 16px;
            color: #657786;
        }
    </style>
    
    <div class="profile-header">
        @if(!empty(Auth::user()->image))
            @php
                $path = 'image/' . Auth::user()->image;
                $url = asset($path);
            @endphp
            <img src="{{ $url }}" alt="Profile Avatar" class="profile-avatar">
            @else
            <img src="https://via.placeholder.com/50" alt="Profile Avatar" class="profile-avatar">
            @endif
        <div class="profile-info">
            <h1>{{ Auth::User()->name }}</h1>
            <p>Bio goes here.</p>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ 'Tambahkan Foto Profile' }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Agar kita Bisa Lebih Saling Mengenal') }}
                    </p>
                    <form action="users/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="file" name="image">
                        <button type="submit"  class="btn btn-primary">Tweet</button>
                    </form>
                </div>
            </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
