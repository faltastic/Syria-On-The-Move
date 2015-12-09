<section class="page-section">
    <div class="section-title">
        <h1>Why</h1>
    </div>
    <ul class="slideshow">
        @foreach(App\Picture::random(9) as $picture)
            <?php $file = $picture->getThumbnail('thumb-550-x') ?>
            <li><img src="{{ $file->getUrl() }}" class="{!! $file->vertical()?'vertical':'horizontal' !!}"/></li>
        @endforeach
    </ul>
    <article>
        <div class="left ar">
            <h2>؟ديدج ناكمل تلصو وا قيرطلاع تنا ،ايروس نم تنا</h2>
            كتيؤرو كعابطناو كتايركذ كراشت كناكماب نوه
            ةطيرخلا ىلا ةروص فضا لبقتسملل
        </div>

        <div class="right">
            <h2>We make Workshops and Exhibitions</h2>
            <p>In diesem Fließtext werden die Workshops an den verschiedenen Orten erwähnt, also in Potsdam, Beispielort2, Beispielort3 und so weiter. Die Ortsnamen kann man anklicken und gelangt dann auf die Galerieseite mit den Fotos der Teilnehmer.</p>
        </div>
    </article>
</section>
