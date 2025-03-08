<div class="card shadow-lg border-0" style="width: 18rem;">
    @isset($image)
        {{ $image }}
    @endisset
<div class="card-body">
    <h5 class="card-title">
        @isset($title)
            {{ $title }}
        @endisset
    </h5>
    <p class="card-text">Bu, kartın içeriğini tanımlayan kısa bir açıklamadır.</p>
    <a href="#" class="btn btn-primary">Daha Fazla</a>
</div>
</div>
