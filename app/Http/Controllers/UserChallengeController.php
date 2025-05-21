<?php

namespace App\Http\Controllers;

use App\Models\UserChallenge;
use App\Models\MasterChallenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChallengeController extends Controller
{
    public function index()
    {
        $userChallenges = UserChallenge::with('challenge', 'user')->get();
        return view('user_challenges.index', compact('userChallenges'));
    }

    public function create()
    {
        $challenges = MasterChallenge::all();
        $currentUser = Auth::user();
        return view('user_challenges.create', compact('challenges', 'currentUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'challenge_id' => 'required|exists:master_challenges,challenge_id'
        ]);

        UserChallenge::create($request->all());

        return redirect()->route('user-challenges.index')
                         ->with('success', 'User Challenge berhasil dibuat.');
    }

    public function show($id)
    {
        $userChallenge = UserChallenge::with('challenge', 'user')->findOrFail($id);
        return view('user_challenges.show', compact('userChallenge'));
    }

    public function edit($id)
    {
        $userChallenge = UserChallenge::with('challenge')->findOrFail($id);
        $challenges = MasterChallenge::all();
        return view('user_challenges.edit', compact('userChallenge', 'challenges'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50'
        ]);

        $userChallenge = UserChallenge::with('challenge')->findOrFail($id);
        $userChallenge->challenge->start_date = $request->input('start_date');
        $userChallenge->challenge->end_date = $request->input('end_date');
        $userChallenge->challenge->status = $request->input('status');
        $userChallenge->challenge->save();

        return redirect()->route('user-challenges.index')
                         ->with('success', 'User Challenge berhasil diupdate.');
    }

    public function destroy($id)
    {
        UserChallenge::destroy($id);
        return redirect()->route('user-challenges.index')
                         ->with('success', 'User Challenge berhasil dihapus.');
    }
}
