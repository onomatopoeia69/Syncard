<?php

namespace App\Http\Controllers;

use App\Models\{Profile, User, Social};
use Illuminate\Support\Facades\Auth;
use App\Helper\ExceptionHelper;
use App\Http\Requests\{StoreProfileRequest, UpdateProfileRequest};

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with([
            'user',
            'user.socials',
            'user.childProfiles',
        ])->latest()->paginate(10);

        $usersWithoutProfile = User::whereDoesntHave('profile')
            ->orderBy('name')
            ->get();

        return view('profile.index', [
            'profiles' => $profiles,
            'usersWithoutProfile' => $usersWithoutProfile,
        ]);
    }

    public function create(string $username)
    {
        $user = Auth::user();

        return view('profile.create', compact('user', 'username'));
    }

    public function store(StoreProfileRequest $request)
    {
        try {
            Profile::create($request->validated());

            return redirect()
                ->route('profile.index')
                ->with('success', 'Profile created successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('profile.index')
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        try {
            $profile->update($request->validated());

            return redirect()
                ->route('profile.index')
                ->with('success', 'Profile updated successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('profile.index')
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function delete(Profile $profile)
    {
        try {
            $profile->delete();

            return redirect()
                ->route('profile.index')
                ->with('success', 'Profile deleted successfully.');

        } catch (\Throwable $e) {

            return redirect()
                ->route('profile.index')
                ->with('error', $e->getMessage());
        }
    }

    public function public(string $username)
    {
        $profile = Profile::with([
            'user',
            'user.socials' => function ($query) {
                $query->where('is_visible', true)
                    ->orderBy('sort_order');
            },
            'user.childProfiles',
        ])
            ->where('username', $username)
            ->firstOrFail();

        return view('profile.public', compact('profile'));
    }
}
