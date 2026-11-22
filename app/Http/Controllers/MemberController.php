<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('name', 'asc')->get();

        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        if ($member->borrowings()->exists()) {
            return redirect()->route('members.index')
                ->with('error', 'Member tidak bisa dihapus karena memiliki riwayat peminjaman.');
        }

        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil dihapus!');
    }
}
