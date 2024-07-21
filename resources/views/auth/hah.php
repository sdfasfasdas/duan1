<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Tên -->
        <div>
            <x-input-label for="name" :value="__('Tên')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Địa chỉ Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Địa chỉ -->
        <div class="mt-4">
            <x-input-label for="diachi" :value="__('Địa chỉ')" />
            <x-text-input id="diachi" class="block mt-1 w-full" type="text" name="diachi" :value="old('diachi')"
                required autocomplete="diachi" />
            <x-input-error :messages="$errors->get('diachi')" class="mt-2" />
        </div>

        <!-- Giới tính -->
        <div class="mt-4">
            <x-input-label for="gioi" :value="__('Giới tính')" />
            <select id="gioi" name="gioi"
                class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
                <option value="0">Khác</option>
            </select>
            <x-input-error :messages="$errors->get('gioi')" class="mt-2" />
        </div>

        <!-- Số điện thoại -->
        <div class="mt-4">
            <x-input-label for="sdt" :value="__('Số điện thoại')" />
            <x-text-input id="sdt" class="block mt-1 w-full" type="text" name="sdt" :value="old('sdt')" required
                autocomplete="sdt" />
            <x-input-error :messages="$errors->get('sdt')" class="mt-2" />
        </div>

        <!-- Mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Xác nhận mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Đã đăng ký?') }}
            </a>

            <x-primary-button class="ms-4 bg-orange-500 hover:bg-orange-600 focus:ring-orange-500">
                {{ __('Đăng ký') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Mã Đặt Lại Mật Khẩu -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Địa chỉ Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Xác nhận mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Đặt Lại Mật Khẩu') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>