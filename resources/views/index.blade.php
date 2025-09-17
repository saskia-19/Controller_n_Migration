@extends('layouts.app')

@section('title', 'Flashy Flashcards - Home')

@section('header', 'Flashy Flashcards')

@section('additional-styles')
<style>
    .hero-section {
        text-align: center;
        padding: 50px 20px;
        background: linear-gradient(135deg, #3787FF 0%, #255ec1 100%);
        color: white;
        margin: -20px -20px 30px -20px;
    }
    .hero-title {
        font-size: 3rem;
        margin-bottom: 20px;
        font-family: 'Rubik One', sans-serif;
    }
    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }
    .decks-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .deck-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }
    .deck-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    .deck-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #3787FF;
        margin-bottom: 10px;
    }
    .deck-description {
        color: #666;
        margin-bottom: 15px;
    }
    .deck-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .card-count {
        background: #e8f2ff;
        color: #3787FF;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: bold;
    }
    .play-btn {
        background: #3787FF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .play-btn:hover {
        background: #255ec1;
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <h1 class="hero-title">Flashy Flashcards</h1>
    <p class="hero-subtitle">Remember in a flash</p>
</div>

<section>
    <h2 style="text-align: center; margin-bottom: 30px; color: #3787FF; font-size: 2rem;">Choose a deck to start!</h2>
    
    <div class="decks-grid">
        @forelse($decks as $deck)
            <!-- HTML: Gunakan data attribute -->
<div class="deck-card" data-deck-id="{{ $deck['id'] }}">

<!-- JavaScript: Handle click event -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deckCards = document.querySelectorAll('.deck-card');
    deckCards.forEach(card => {
        card.addEventListener('click', function(e) {
            if (e.target.classList.contains('play-btn')) {
                return; // Jangan redirect jika tombol yang diklik
            }
            const deckId = this.getAttribute('data-deck-id');
            window.location.href = `/play/${deckId}`;
        });
    });
});
</script>
                <div class="deck-title">{{ $deck['title'] }}</div>
                <div class="deck-description">{{ $deck['description'] }}</div>
                <div class="deck-stats">
                    <span class="card-count">{{ $deck['card_count'] }} cards</span>
                    <a href="{{ route('gameplay', $deck['id']) }}" class="play-btn">Mulai Main</a>
                </div>
            </div>
        @empty
            <p style="text-align: center; color: #666; grid-column: 1/-1;">
                Tidak ada deck tersedia saat ini.
            </p>
        @endforelse
    </div>
</section>
@endsection

@section('scripts')
<script>
    console.log('Index page loaded');
    
    // Animasi entrance untuk cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.deck-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s, transform 0.5s';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 150);
        });
    });
</script>
@endsection