@extends('layouts.app')

@section('content')
  @if (!have_posts())
    @php
      $title = get_field('404_title','option');
      $text = get_field('404_text','option');
      $image = get_field('404_image','option');
      $cta = get_field('404_cta','option');
    @endphp
    <div class="row">
      <div class="column">
        <div class="error404__inner">
          @if($title)
            <h1>{!! $title !!}</h1>
          @endif
          @if($image)
            @include('globals.image')
          @endif
          @if($text)
            <p>{!! $text !!}</p>
          @endif
          @if($cta)
            @include('globals.button',['button'=>$cta])
          @endif
        </div>
        @include('blocks.footer-cta',[
          'include_splash' => false,
          'include_box' => true,
          'box_count' => 'two',
          'include_or' => true,
          'splash' => false,
          'cta_1' => [
              'pretitle' => false,
              'title' => __('Like to speak to sales?<br>1 888 AMJ MOVE (265-6683)','aventi'),
              'text' => false,
              'button' => false,
          ],
          'cta_2' => [
              'pretitle' => false,
              'title' => __('Get a free estimate<br>it takes only 5 minutes!','aventi'),
              'text' => false,
              'button' => [
                'button_text' => __('Get a Quote','aventi'),
                'button_link' => '/get-a-quote',
                'button_style' => 'arrow',
                'open_url_in_new_tab' => false
              ],
          ],
        ])
      </div>
    </div>
  @endif
@endsection
