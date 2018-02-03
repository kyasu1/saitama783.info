@extends('layouts.app')

@section('content')
  <h1 class="ph2">{{ the_title() }}</h1>
  @while(have_posts()) @php(the_post())
      <div class="lh-copy">
      <h2 class="my-bg-corso-red white tc pv2">ご案内</h2>
      <p class="ph2">
      JR浦和駅西口駅前のコルソにて開催される、質屋のチャリティ大バーゲンです。2018年の今年は17回目、総額20億円相当の高級時計・ブランドバッグ・ジュエリーがバーゲン価格で販売となります。期間中は特別企画が毎日行われますのでお楽しみに。あの<img src="https://www.saitama783.info/wp-content/uploads/2018/01/shichimaru-logo.png" alt="しちまる" height="16" class="dib mh2 wp-image-767" />もヘルプに来る予定です！
      </p>
      <h3 class="bb my-b--corso-red f4 tc pb1">日程</h3>
      <p class="tc">2018.03.22(Ths) ~ 03.25(Sun)</p>
      <h3 class="bb my-b--corso-red f4 tc pb1">時間</h3>
      <p class="tc mv1">AM10:00 ~ PM 7:00</p>
      <p class="tc mv1">(最終日はPM 5:00まで)</p>

      <p class="tc mv1">
      <a target="_blank" href="https://calendar.google.com/event?action=TEMPLATE&amp;tmeid=MG0xMTd0M250c3M4OHRwYzRzbmNvZXNzNDYgOG5lNmV1OGYyNTBqdGs1anZncmg0dHU4aHNAZw&amp;tmsrc=8ne6eu8f250jtk5jvgrh4tu8hs%40group.calendar.google.com"><img border="0" src="https://www.google.com/calendar/images/ext/gc_button1_ja.gif"></a>
      </p>

      <h2 class="my-bg-corso-red white tc pv2">会場アクセス</h2>
      <p class="tc mv1">JR浦和駅西口駅前</p>
      <p class="tc mv1">CORSO 7階コルソホール</p>
      <p class="tc mv1">埼玉県さいたま市浦和区高砂1-12-1</p>
      <p class="tc mv1">TEL [tel]048-824-5555[/tel]</p>

      <h3 class="bb my-b--corso-red f4 tc pv2">電車でお越しのお客様</h3>
      <ul class="list tc pl0">
      <li>大宮駅よりJR京浜東北線で10分</li>
      <li>赤羽駅よりJR京浜東北線で14分</li>
      <li>上野駅よりJR京浜東北線で31分</li>
      <li>JR浦和駅西口より徒歩1分</li>
      </ul>
      <h3 class="bb my-b--corso-red f4 tc pv2">お車でお越しのお客様</h3>
      <p class="ph2">コルソ・伊勢丹駐車場をご利用頂けますが、当バーゲン会場では駐車場サービス券は発行致しません。ご了承のうえ、ご利用ください。詳細は<a class="link b my-corso-red" href="https://urawa-corso.com/info/index.html">こちら</a>を御覧ください。</p>

      {{-- Google Maps --}}
      <p style="text-align: center;">
        <iframe style="border: 0;" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDFl_jeTFUYJRATFB6VNDX59n3Xu1hktBU&amp;q=浦和コルソ"
                width="100%"
                height="450"
                frameborder="0"
                allowfullscreen="allowfullscreen">
          <span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span>
        </iframe>
      </p>
      <div class="tr mv2 mh2">
        <a href="https://www.google.co.jp/maps/search/?api=1&query_place_id=ChIJF86B3oPqGGAR97hMrz_VE_s&query=浦和コルソショッピングセンター"
           class="dib ba bw1 w-100 w5-l my-dark-blue pa2 link" target="_blank">
          <div class="tc dim b">Googleマップを開く</div>
        </a>
      </div>

      <h2 class="my-bg-corso-red white tc pv2">会場案内</h2>
      <img class="aligncenter size-full wp-image-706" src="https://www.saitama783.info/wp-content/uploads/2018/01/hallmap.jpg" alt="会場図" width="321" height="400" />
      <ul class="f5">
       	<li>初日のみ時計コーナーにチラシ掲載商品を展示いたします</li>
       	<li>バッグコーナーには専用の出入口がございます</li>
       	<li>スムーズな現金でのお支払いにご協力ください</li>
       	<li>現金でお買上げの場合は各販売ブースでの清算となります</li>
       	<li>クレジットカードでお買上げの方はカード会計コーナーでの清算となります</li>
       	<li>カード会計コーナーは混雑の為、長時間お待ちいただく場合がございます</li>
       	<li>お買い上げの際にお渡しする「お客様控えの伝票」は大切に保管してください</li>
      </ul>
      <p class="f5 ph2">商品数により各ブースの場所が若干変更になる場合がありますのでご了承ください</p>

      <h2 class="my-bg-corso-red white tc pv2">チラシ掲載商品</h2>
      {!! App\related_bargain( array(
          'year' => '2018',
          'orderby' => 'ID',
      ))
      !!}

      <h2 class="my-bg-corso-red white tc pv2">イベント情報</h2>

      <h3 class="bb my-b--corso-red f4 tc pv2">特別企画</h3>
      <ul class="f5">
      <li>憧れのブランドバッグ　「厳選ブランド3万円以下コーナー」（毎日追加あり！）</li>
      <li>最終日だけの現金特価！　3月25日(日)現金でのお買い上げに限り「5％OFF」<BR>（1点￥10,500以上の商品・他割引きと併用不可）</li>
      </ul>

      <h3 class="bb my-b--corso-red f4 tc pv2">お買い得コーナー</h3>
      <ul class="f5">
      <li>ジュエリー　1万円以下コーナー / 2万円・3万円均一コーナー</li>
      <li>バッグ　エルメス・シャネル特設コーナー</li>
      <li>バッグ　埼玉県最大級！ルイヴィトン特設コーナー</li>
      </ul>

      <h3 class="bb my-b--corso-red f4 tc pv2">買取りコーナー</h3>
      <ul class="f5">
      <li>金・プラチナ製品（壊れていてもOK）</li>
      <li>ダイヤ・色石・ジュエリー製品 </li>
      <li>腕時計・提げ時計</li>
      <li>ブランドバッグ・財布・小物</li>
      <li>古銭・旧紙幣など...</li>
      </ul>
      <p class="my-corso-red b ph2">契約の際には身分証明書が必要になります。なお、20歳未満の方のご利用はできません</p>

      @php
      $shops = array
        (
        array(1, "https://itp.ne.jp/shop/KN1100112500005091/", "菊田商事" ,"049-282-2836"),
        array(3, "/shopinfo/株-池田屋質店", "池田屋質店" ,"048-987-0078"),
        array(4, "/shopinfo/有-小川商会/", "小川商会" ,"048-976-9640"),
        array(5, "/shopinfo/ドライブスルー質屋ハラダ", "質ハラダ" ,"048-985-0071"),
        array(6, "/shopinfo/日下部質店-谷塚店", "日下部質店" ,"048-752-6024"),
        array(7, "/shopinfo/有-清水屋", "清水屋" ,"048-641-1738"),
        array(8, "https://www.rakuten.co.jp/shichi-shimizuya/info.html", "ジュエルサプライ" ,"03-3834-2919"),
        array(9, "/shopinfo/有-新田アデ川質店", "新田アデ川質店" ,"048-936-6511"),
        array(10, "/shopinfo/マルイチ質店", "坂戸マルイチ" ,"049-283-6886"),
        array(11, "/shopinfo/有-ディスカウントショップ大黒屋", "DS大黒屋"	,"042-972-3997"),
        array(12, "/shopinfo/有-辻屋質店", "辻屋質店" ,"049-283-0333"),
        array(13, "https://7saito.com/", "質サイトウ" ,"03-3853-0078"),
        array(14, "/shopinfo/質ミウラ", "質ミウラ" ,"048-831-5210"),
        array(15, "/shopinfo/ウラワ質店", "ウラワ質店" ,"048-881-0101"),
        array(16, "/shopinfo/サイトウ質屋-南浦和", "質蔵のサイトウ" ,"048-882-1678"),
        array(18, "/shopinfo/株-midoriya（ミドリヤ）", "川越ミドリヤ" ,"049-224-2200"),
        array(19, "/shopinfo/有-ゆづき質店", "ゆづき質店" ,"048-641-0878"),
        array(20, "/shopinfo/サイトウ質屋-川口", "サイトウ質屋"	,"048-267-1000"),
        array(21, "/shopinfo/富士屋質店", "富士屋質店" ,"048-822-4354"),
        array(22, "/shopinfo/有-みさと質店", "みさと質店" ,"048-957-4334")
        );
      @endphp
      <h2 class="my-bg-corso-red white tc pv2">出品店舗</h2>
      <ul class="f5 pl0 pl2-ns">
          <li class="flex ph2">
              <div class="w3 tc">店番</div>
              <div class="flex-auto tc">屋号</div>
              <div class="w4 w5-ns tc">電話番号</div>
          </li>
      @foreach( $shops as $shop )
          <li class="flex ph2 pt1">
              <div class="w3 tc">{{ $shop[0] }}</div>
              <div class="flex-auto pl1">
                  <a class="link black" href="{{ $shop[1] }}">{{ $shop[2] }}</a>
              </div>
              <div class="w4 w5-ns tc">
                  {!! App\mobile_tel(array( 'class' => 'link my-purple b' ), $shop[3]) !!}
              </div>
          </li>
      @endforeach
      </ul>
      <h4 class="tc"><strong>お問合せ</strong></h4>
      <p class="tc mv1">新田・アデ川質店 {!! App\mobile_tel(array( 'class' => 'link black' ), "048-936-6511") !!}</p>
      <p class="tc mv1 f6 f5-ns underline">出品商品や価格についてのお問合せはご遠慮ください</p>
      <h4 class="tc"><strong>主催</strong></h4>
      <p class="tc mv1">質屋エイト会（埼質連青年部有志）</p>
      <h4 class="tc"><strong>協賛</strong></h4>
      <p class="tc mv1">埼玉県質屋組合連合会</p>
      <h4 class="tc"><strong>ヘルプ</strong></h4>
      <p class="tc mv1"><img src="https://www.saitama783.info/wp-content/uploads/2018/01/shichimaru-01.png" alt="" width="229" height="266" class="aligncenter size-full wp-image-772" /></p>
  </div>
  @endwhile
@endsection
