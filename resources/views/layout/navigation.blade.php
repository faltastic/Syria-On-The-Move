<div id="navigation-wrapper">
    <nav id="navigation">
        <ul>
            <li class="logo"><a href="/">{!! HTML::image(asset('img/syriaonthemove-nav.png')) !!}</a></li>
            <li>{!! HTML::linkAction('PageController@getMap', 'Map') !!}</li>
            <li>{!! HTML::link('/#why', 'Why') !!}</li>
            <li>{!! HTML::link('/#workshops', 'Workshops') !!}</li>
            <li>{!! HTML::link('/#team', 'Team') !!}</li>
            <li>{!! HTML::link('/#links', 'Links') !!}</li>
        </ul>
    </nav>
</div>
