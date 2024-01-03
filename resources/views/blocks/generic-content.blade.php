@if($content)
  <section class="section generic-content" id="{{ $id }}">
    <div class="row">
      <div class="column">
        {!! $content !!}
      </div>
    </div>
  </section>
@endif
