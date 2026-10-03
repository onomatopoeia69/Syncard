<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Requests\SocialsRequest;

class SocialsController extends Controller
{
    public function index()
    {
        try {
            $socials = Social::where('user_id', auth()->id())
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
            return view('users.socials.index', compact('socials'));

        } catch (\Throwable $e) {
            return redirect()
                ->route('users.dashboard')
                ->with('error', 'Unable to load social links. Please try again.');
        }
    }
    public function store(SocialsRequest $request)
    {
        try {
            $validated = $request->validated();

            Social::create([
                'user_id' => auth()->id(),
                'platform' => $validated['platform'],
                'username' => $validated['username'] ?? null,
                'url' => $validated['url'],
                'label' => $validated['label'] ?? null,
                'icon' => $validated['icon'] ?? null,
                'is_visible' => true,
                'is_verified' => false,
                'sort_order' => 0,
                'verified_at' => null, 
            ]);

            return redirect()
                ->route('socials.index')
                ->with('success', 'Social link added successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('socials.index')
                ->withInput()
                ->with('error', 'Unable to add social link. Please try again.');
        }
    }

    public function update(SocialsRequest $request, Social $social)
    {
        try {
            if ($social->user_id !== auth()->id()) {
                abort(403);
            }

            $validated = $request->validated();

            $social->update([
                'platform' => $validated['platform'],
                'username' => $validated['username'] ?? null,
                'url' => $validated['url'],
                'label' => $validated['label'] ?? null,
                'icon' => $validated['icon'] ?? null,
                'is_visible' => $request->boolean('is_visible'),
            ]);

            return redirect()
                ->route('socials.index')
                ->with('success', 'Social link updated successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('socials.index')
                ->withInput()
                ->with('error', 'Unable to update social link. Please try again.');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $ids = $request->input('ids', []);

            if (empty($ids)) {
                return redirect()
                    ->route('socials.index')
                    ->with('error', 'No social links were selected.');
            }

            Social::where('user_id', auth()->id())
                ->whereIn('id', $ids)
                ->delete();

            return redirect()
                ->route('socials.index')
                ->with(
                    'success',
                    count($ids) === 1
                    ? 'Social link deleted successfully.'
                    : count($ids) . ' social links deleted successfully.'
                );

        } catch (\Throwable $e) {
            return redirect()
                ->route('socials.index')
                ->with('error', 'Unable to delete social link(s). Please try again.');
        }
    }
}
