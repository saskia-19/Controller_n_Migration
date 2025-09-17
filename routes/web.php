<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (hero section)
Route::get('/', function () {
    // Data dummy untuk deck cards
    $decks = [
        [
            'id' => 1,
            'title' => 'インドネシアで行われたデモ',
            'description' => 'このデッキを使用すると、今年 8 月にインドネシアで何が起こったのかについて、自分がどの程度理解しているかがわかります。',
            'card_count' => 3
        ]
    ];
    
    return view('index', compact('decks'));
})->name('home');

// Route untuk gameplay dengan parameter deck_id
Route::get('/play/{deck_id}', function ($deck_id) {
    // Data dummy untuk deck yang dipilih
    $deck = [
        'id' => $deck_id,
        'title' => 'インドネシアで行われたデモ'
    ];
    
    // Data dummy untuk cards
    $cards = [
        [
            'card_id' => 1,
            'front_text' => 'インドネシアでのデモのきっかけは何でしたか?',
            'back_text' => '衆議院の手当政策',
            'hint' => 'お金'
        ],
        [
            'card_id' => 2,
            'front_text' => 'ブレイブピンクとはどういう意味ですか?',
            'back_text' => '当局に立ち向かう勇気を持ったピンクのヒジャブをかぶった老婦人',
            'hint' => '勇気'
        ],
        [
            'card_id' => 3,
            'front_text' => 'ヒーローグリーンはどういう意味ですか?',
            'back_text' => 'パトカーに轢かれたバイクタクシー運転手の身元',
            'hint' => '非人道的'
        ]
    ];
    
    // Data dummy untuk comments
    $comments = [
        [
            'username' => 'Anohito',
            'comment' => '早く良くなりますように私の国'
        ],
        [
            'username' => 'ひいろ',
            'comment' => '兵士である私でさえ、そのようなことはしないし、彼らの顔に一滴の涙を見ることさえ耐えられないだろう。'
        ]
    ];
    
    return view('gameplay', compact('deck', 'cards', 'comments', 'deck_id'));
})->name('gameplay');

// Route untuk API endpoints (untuk AJAX)
Route::post('/api/flag-card', function () {
    return response()->json(['success' => true]);
})->name('flag.card');

Route::post('/api/submit-comment', function () {
    return response()->json([
        'success' => true,
        'username' => 'User',
        'comment_html' => request('comment_text')
    ]);
})->name('submit.comment');

Route::post('/login', [PostController::class,'index']) ->name('login.submit');