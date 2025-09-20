@props(['user', 'size' => 'w-12 h-12'])

@if ($user->image)
    <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}"
        class="{{ $size }} rounded-full">
@else
    <img src="https://cdn12.picryl.com/photo/2016/12/31/head-the-dummy-avatar-people-b61cdb-1024.png"
        alt="Dummy avatar" class="{{ $size }} rounded-full">
@endif