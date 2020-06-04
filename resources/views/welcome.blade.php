@extends('layouts.app')

@section('title', 'Книжный интернет магазин WebBook')

@section('content')
    <style>
        body {
            padding: 0;
        }
    </style>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="book-bg" src="{{ asset('image/book-bg.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Best books on the market.</h1>
                        <p>You can buy the latest books from us at the lowest prices.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('Book.book.index') }}" role="button">Read
                                more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="book-bg" src="{{ asset('image/book-bg1.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Matt Ridley.</h1>
                        <p>is a British journalist and businessman. Ridley is known for his work in science, the
                            environment, and economics.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('Book.book.index') }}" role="button">Read
                                more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="book-bg" src="{{ asset('image/book-bg2.jpg') }}" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Always the most interesting and cool books.</h1>
                        <p>You have over 5,000 books and the highest quality book scanners.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('Book.book.index') }}" role="button">Read
                                more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="avatar mb-2" src="{{ asset('image/people/nick.png') }}" alt="">
                <h2>Nick</h2>
                <p>UX Designer living and working in Manchester, United Kingdom. I am currently working for the
                    BBC in MediaCityUK working on a wide variety of digital services.
                    From a young age I have been designing and building things that not only look nice but work well for
                    the people using them.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="avatar mb-2" src="{{ asset('image/people/serafim.png') }}" alt="">
                <h2>Serafim</h2>
                <p>This is mostly to help me develop my craft and experiment with new technologies.
                    Most recently, I launched Others Work a digital platform for designers and developers to share and
                    submit their latest web projects. I also have an Online Print Shop where I sell most of my
                    prints.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="avatar mb-2" src="{{ asset('image/people/mark.png') }}" alt="">
                <h2>Mark</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                    porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh,
                    ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">All about the book. <span class="text-muted">Rational Optimist.</span>
                </h2>
                <p class="lead">The book of the renowned scientific journalist Matt Ridley, “Rational Optimist,” is
                    dedicated to the idea that, despite the current crises and temporary regression, mankind has very
                    good prospects. Progress is really good, and the world is as great a place to live as it has always
                    been. Matt Ridley offers a simple answer to humanity on the most important questions, arguing that
                    we go forward only when we act together and trust each other.</p>
            </div>
            <div class="col-md-5">
                <img class="book_content_image" src="{{ asset('image/book_content/book-content1.png') }}" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">All about the book. <span
                        class="text-muted">Genome. View autobiography</span></h2>
                <p class="lead">Genetics is developing rapidly. Its development is often compared to revolution. Not
                    only the general public, but also specialists have no time to keep track of how our ideas about life
                    and heredity are changing. This generates a lot of rumors and speculation about the terrible mutants
                    that insidious scientists stamp in their laboratories, while the astounding discoveries of new
                    methods for diagnosing and treating genetic diseases, including cancer, go unnoticed or
                    misunderstood. Matt Ridley's book is very relevant. Simple and accessible, the author presented the
                    history of genetics from the first guesses to the stunning breakthrough that began with the
                    discovery of the DNA structure by Watson and Crick.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="book_content_image" src="{{ asset('image/book_content/book-content2.png') }}" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">All about the book. <span class="text-muted">The Origin of Altruism and Virtue.</span>
                </h2>
                <p class="lead">The new book of the famous scientist and journalist Matt Ridley “The Origin of Altruism
                    and Virtue” contains a review and generalization of everything that has become known about the
                    social behavior of a person over thirty years. One of the main objectives of his book is “to help
                    people take a look from the side at our biological species with all its weaknesses and
                    shortcomings.” Ridley criticizes the well-known model, which claims that in the formation of human
                    behavior, culture almost completely supplants biology.</p>
            </div>
            <div class="col-md-5">
                <img class="book_content_image" src="{{ asset('image/book_content/book-content3.png') }}" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
@endsection
