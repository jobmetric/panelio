@extends('domi::layout')

@section('head')
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #6b3ad1;
        }

        .we-carousel {
            position: relative;
            display: flex;
            align-items: center;
        }

        .we-card-container {
            width: 380px;
            height: 250px;
            position: relative;
        }

        .we-card {
            width: 380px;
            height: 250px;
            background-color: #fff;
            box-shadow: 0 0 4px 3px #dddd;
            color: #000;
            border-radius: 10px;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            transition: all 0.5s ease;
            filter: none;
        }

        .we-card div {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: black;
        }

        .we-card a {
            text-decoration: none;
        }

        .we-card h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .we-card p {
            color: #555;
            line-height: 1.7;
        }

        .we-card.active {
            opacity: 1;
            z-index: 2;
            transform: translateX(0);
        }

        .we-card.prev-1,
        .we-card.next-1 {
            opacity: 0.5;
            filter: blur(4px);
            z-index: 1;
        }

        .we-card.prev-2,
        .we-card.next-2 {
            opacity: 0.2;
            filter: blur(6px);
            z-index: 1;
        }

        .we-card.prev-3,
        .we-card.next-3 {
            opacity: 0;
        }

        .we-card.prev-1 {
            transform: translateX(-230px) rotate(-10deg) translateY(20px);
        }

        .we-card.next-1 {
            transform: translateX(230px) rotate(10deg) translateY(20px);
        }

        .we-card.prev-2 {
            transform: translateX(-483px) rotate(-20deg) translateY(80px);
        }

        .we-card.next-2 {
            transform: translateX(483px) rotate(20deg) translateY(80px);
        }

        .we-card.prev-3 {
            transform: translateX(-697px) rotate(-30deg) translateY(172px);
        }

        .we-card.next-3 {
            transform: translateX(697px) rotate(30deg) translateY(172px);
        }

        .we-arrow {
            font-size: 24px;
            cursor: pointer;
            user-select: none;
            color: #000;
            padding: 20px;
            z-index: 20;
        }

        .we-arrow:hover {
            color: #555;
        }
    </style>
@endsection

@section('content')
    <div class="we-carousel">
        <div class="we-arrow left">&#10094;</div>
        <div class="we-card-container">
            @foreach($panels as $panel)
                <div class="we-card">
                    <a href="{{ route('panel.' . $panel['slug'] . '.dashboard') }}">
                        <div>
                            <i class="{{ $panel['args']['icon'] }}"></i>
                            <h3>{{ $panel['slug'] }}</h3>
                        </div>
                        <p>{{ $panel['args']['description'] }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="we-arrow right">&#10095;</div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            let currentCardIndex = 0;
            const cards = $('.we-card');
            const totalCards = cards.length;

            function updateCarousel() {
                cards.removeClass('active prev-1 next-1 prev-2 next-2 prev-3 next-3');
                $(cards[currentCardIndex]).addClass('active');

                const prevIndex_1 = (currentCardIndex - 1 + totalCards) % totalCards;
                const nextIndex_1 = (currentCardIndex + 1) % totalCards;
                const prevIndex_2 = (currentCardIndex - 2 + totalCards) % totalCards;
                const nextIndex_2 = (currentCardIndex + 2) % totalCards;
                const prevIndex_3 = (currentCardIndex - 3 + totalCards) % totalCards;
                const nextIndex_3 = (currentCardIndex + 3) % totalCards;

                $(cards[prevIndex_1]).addClass('prev-1');
                $(cards[nextIndex_1]).addClass('next-1');
                $(cards[prevIndex_2]).addClass('prev-2');
                $(cards[nextIndex_2]).addClass('next-2');
                $(cards[prevIndex_3]).addClass('prev-3');
                $(cards[nextIndex_3]).addClass('next-3');
            }

            updateCarousel();

            $('.right').click(function () {
                currentCardIndex = (currentCardIndex + 1) % totalCards;
                updateCarousel();
            });

            $('.left').click(function () {
                currentCardIndex = (currentCardIndex - 1 + totalCards) % totalCards;
                updateCarousel();
            });
        });
    </script>
@endsection
