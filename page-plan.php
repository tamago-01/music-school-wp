<?php get_header(); ?>
<main class="main p-page-plan">
    <div class="c-kv">
        <picture>
            <source media="(max-width: 767px)"
                srcset="<?php echo get_template_directory_uri(); ?>/img/plan/plan-kv_sp.webp">
            <img src="<?php echo get_template_directory_uri(); ?>/img/plan/plan-kv_pc.webp" alt="白いギター、キーボード、PCの画像">
        </picture>
        <div class="c-kv__overlay"></div>
        <div class="c-kv__catch">
            <h1>プラン・料金</h1>
        </div>
    </div>
    <div class="c-breadcrumbs">
        <div class="l-inner">
            <nav>
                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="index.html"><span itemprop="name">ホーム</span></a>
                        <meta itemprop="position" content="1" />
                        <span class="c-breadcrumbs__arrow">&gt;</span>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span class="c-breadcrumbs__current" itemprop="name">プラン・料金</span>
                        <meta itemprop="position" content="2" />
                    </li>

                </ol>
            </nav>
        </div>
    </div>
    <section id="price" class="p-price">
        <div class="l-inner">
            <h2 class="c-section-title p-plan__section-title">料金体系</h2>
            <div class="p-price__contents">
                <div class="p-price__items">
                    <div class="p-price__item">入会金 39,000円</div>
                    <div class="p-price__plus">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/plan/plus.svg" alt="プラスマーク">
                    </div>
                    <div class="p-price__item">月額料金</div>
                </div>
                <div class="p-price__textarea">
                    きたむらミュージックスクールでは、個人に合わせたサポートを行う完全オーダーメイドのプランを用意しており、サポート内容により月額料金が異なります。担当者があなたに最適なプランを提案いたしますので、お気軽にお問い合わせください。※すべての料金は税込価格となります。
                </div>
            </div>

        </div>

    </section>
    <section id="plan" class="p-plan">
        <div class="l-inner">
            <h2 class="c-section-title p-plan__section-title">プラン内容・月額料金</h2>
            <div class="p-plan__contents">
                <table class="p-plan__price-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ベーシック<br class="sp">プラン</th>
                            <th class="p-plan__outstand">
                                <span class="p-plan__outstand-ttl"><span class="p-plan__font-s">おすすめ</span><br>スタンダード<br
                                        class="sp">プラン</span>
                            </th>
                            <th>プレミアム<br class="sp">プラン</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>月額料金</td>
                            <td>39,000円</td>
                            <td>59,000円</td>
                            <td>128,000円</td>
                        </tr>
                        <tr>
                            <th>マンツーマン授業</th>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg"
                                    alt="黒色の○">週１回</td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-r.svg"
                                    alt="赤色の○">週２回</td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg"
                                    alt="赤色の○">無制限</td>
                        </tr>
                        <tr>
                            <th>ビジネス基本講座</th>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg" alt="黒色の○">
                            </td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-r.svg" alt="赤色の○">
                            </td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg" alt="黒色の○">
                            </td>
                        </tr>
                        <tr>
                            <th>練習ROOM利用</th>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg"
                                    alt="黒色の○">月10時間</td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-r.svg"
                                    alt="赤色の○">月20時間</td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg"
                                    alt="黒色の○">無制限</td>
                        </tr>
                        <tr>
                            <th>ビジネスコンサル</th>
                            <td><span class="p-plan__bar"></span></td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-r.svg"
                                    alt="赤色の○">月２回</td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg"
                                    alt="黒色の○">月3回</td>
                        </tr>
                        <tr>
                            <th>コミュニティ<br class="sp">参加資格</th>
                            <td><span class="p-plan__bar"></span></td>
                            <td><span class="p-plan__bar"></span></td>
                            <td><img src="<?php echo get_template_directory_uri(); ?>/img/plan/circle-b.svg" alt="黒色の○">
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="p-plan__attention">※各サービスは１回ごとのオプション追加が可能です。詳しくは事務局までお問い合わせください。</div>
        </div>
    </section>

    <?php get_template_part('template-parts/fix-area'); ?>

</main>

<?php get_footer(); ?>