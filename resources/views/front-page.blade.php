@extends('layouts.app')

@section('content')
  <div class="mw100 ba">
    <a href="{{ get_field('banner-url')}}" class="link">
    {!! wp_get_attachment_image( get_field('banner-image'), 'large', false, array( 'class' => 'h-auto w-100')) !!}
    </a>
  </div>
  <div>
    <h2 class="my-bg-purple f3 tc pv3 mv2 white">
      新着情報
    </h2>
    @php
    $args = array(
      'posts_per_page' => 10,
      'category_name' => 'news',
    );
    $the_query = new WP_Query( $args );
    @endphp

    @if (!empty($the_query))
    <section>
      @while( $the_query->have_posts() ) @php($the_query->the_post())
        @include('partials.content')
      @endwhile @php(wp_reset_postdata())
    </section>
    @else
    <div class="tc f3 ba pv6">記事がありません</div>
    @endif
  </div>
  <div class="lh-copy">
    <h2 id="info-pawn" class="my-bg-gold f3 tc pv3 mv2 white">
      「質預かり」という選択
    </h2>
    <h3 class="tc my-purple">
      01<br>お品物を担保にお金をご融資します
    </h3>
    <p class="ph1 ph3-ns">質屋はお客様のお品物を預かり、その品物の査定額の範囲内でお金をお貸しします。これを「質預かり」といいます。私たちはお客様のお品物をお預かりし、お金をお渡しします。お品物は大切に質蔵で保管させて頂きます。</p>
    <hr class="my-bg-dark-blue">
    <h3 class="tc my-purple">
      02<br>元金+質料の支払で品物が戻ります
    </h3>
    <p class="ph1 ph3-ns">お預かり期間は質屋営業法に基づき3ヶ月です。その間に、元金と質料(利息)をお支払い頂ければ、預けた品物がお客様のお手元に戻ります。</p>
    <p class="ph1 ph3-ns">※質料(利息)については、質屋営業法で定められた範囲内で、店舗ごとに設定しています。詳細は各店舗に問い合わせください。</p>
    <hr class="my-bg-dark-blue">
    <h3 class="tc my-purple">
      03<br>質料のお支払で期限の延長も可能
    </h3>
    <p class="ph1 ph3-ns">質料(利息)をお支払い頂いた場合、質預かりの期限の延長をすることもできます。</p>
    <p class="ph1 ph3-ns">※質料(利息)については、質屋営業法で定められた範囲内で、店舗ごとに設定しています。詳細は各店舗に問い合わせください。</p>
    <hr class="my-bg-dark-blue">
    <h3 class="tc my-purple">
      04<br>ご返済の義務はありません
    </h3>
    <p class="ph1 ph3-ns">お預かりの期限を過ぎてしまった場合は、「質流れ」となり、お品物の所有権は「質屋」へ移ります。この場合、お客様は、元金と質料(利息)をお支払頂く必要はありません。</p>
    <hr class="my-bg-dark-blue">
    <h3 class="tc my-purple">
      05<br>取り立てなしの安心システム
    </h3>
    <p class="ph1 ph3-ns">万が一、返済が困難になっても、質屋なら安心です。銀行や消費者金融と違い、お品物を手放してしまえば、その後の督促や、取り立ては一切ない安心なシステムです。</p>
    <p class="ph1 ph3-ns">埼玉県質屋組合連合会加盟店は、埼玉県公安委員会の許可によって営業し、質屋営業法に基づき営業しております。ですから、安心して、質屋をご利用なさってみて下さい。</p>
    <h2 id="info-buyout" class="my-bg-gold f3 tc pv3 mv2 white">
      「買取り」という選択
    </h2>
    <h3 class="tc my-purple">
      06<br>ご不要のお品物をその場で買取!
    </h3>
    <p class="ph1 ph3-ns">
      お客様がお持ちになったお品物を、査定し、買取させていただきます。<span class="underline">「もう使わないけど、捨てるにはもったいない」</span><span class="underline">「飽きてしまったので新しい物に買い換えたい」</span>という時は、「買取」というシステムをご利用下さい。
    </p>
    <p class="ph1 ph3-ns"> 「買取」は、「質預かり」とは違い、一度売ってしまうと、お品物はもうお客様の手元には戻りません。買取が成立した時点でお品物の所有権は質屋に移ります。</p>
    <p class="ph1 ph3-ns"> 「大切な品物を手放したくない」または、「手放すかどうか迷っている」という方は、<a href="#info-pawn" class="link my-dark-blue b">「質預かり」</a>というシステムのご利用をおすすめいたします。</p>
    <hr class="my-bg-dark-blue">
    <h3 class="tc my-purple">
      07<br>より高く売るためには?
    </h3>
    <p class="ph1 ph3-ns">お品物は、汚れを落とし、なるべくきれいな状態でお持ちください。また、ご購入した際の付属品があれば、一緒にお持ち下さい。査定が高くなる可能性があります。</p>
    <h2 class="my-bg-gold f3 tc pv3 mv2 white">
      お取引の前に
    </h2>
    <h3 class="tc my-purple">
      08<br>身分証明書が必要です
    </h3>
    <p class="ph1 ph3-ns">ご利用の際は、身分証明書が必要です。運転免許証や保険証、パスポートなどをお持ち下さい。詳細は各店舗に問い合わせ下さい。</p>
  </div>
  @include('partials.sns')
@endsection
