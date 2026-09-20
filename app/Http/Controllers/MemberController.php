<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            [
                'name' => 'Nabil Muzakki',
                'email' => 'nabil@gmail.com'
            ],
            [
                'name' => 'Rizqi',
                'email' => 'rizqi@gmail.com'
            ],
            [
                'name' => 'Jeki',
                'email' => 'jeki@gmail.com'
            ],
            [
                'name' => 'Zhilan',
                'email' => 'zhilan@gmail.com'
            ],
            [
                'name' => 'Lukman',
                'email' => 'lukman@gmail.com'
            ]
        ];

        return view('member.index', compact('members'));
    }
}