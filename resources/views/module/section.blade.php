<section class="page-section">
    <div class="section-title">
        <h1>@yield('title')</h1>
    </div>

    @yield('slideshow')

    <article>
        <div class="left ar">
            @yield('left')
        </div>

        <div class="right">
            @yield('right')
        </div>
    </article>
</section>
