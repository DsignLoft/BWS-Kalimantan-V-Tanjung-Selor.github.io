@props(['title'])

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container-fluid">
        <ol>
            <li><a href="/">Beranda</a></li>
            <li>{{ $title }}</li>
        </ol>
        <h2>{{ $title }}</h2>
    </div>
</section>