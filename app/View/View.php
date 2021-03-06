<?php


namespace App\View;


class View
{
    public function handle()
    {
        \Illuminate\Support\Facades\View::composer(['*'] , min_menu::class);
        \Illuminate\Support\Facades\View::composer(['*'] , all_menu::class);
        \Illuminate\Support\Facades\View::composer(['*'] , sub_all_menu::class);
        \Illuminate\Support\Facades\View::composer(['*'] , banner_slider::class);
        \Illuminate\Support\Facades\View::composer(['*'] , slider::class);
        \Illuminate\Support\Facades\View::composer(['*'] , discounted_products::class);
        \Illuminate\Support\Facades\View::composer(['*'] , banner_up::class);
        \Illuminate\Support\Facades\View::composer(['*'] , market_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , product_mobile::class);
        \Illuminate\Support\Facades\View::composer(['*'] , banner_center::class);
        \Illuminate\Support\Facades\View::composer(['*'] , tools_mobile::class);
        \Illuminate\Support\Facades\View::composer(['*'] , watch_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , spicer_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , products::class);
        \Illuminate\Support\Facades\View::composer(['*'] , image_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , properties_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , brand_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , attr_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , comment_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , attr_good_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , attr_not_good_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , reply_comment::class);
        \Illuminate\Support\Facades\View::composer(['*'] , save_product::class);
        \Illuminate\Support\Facades\View::composer(['*'] , city::class);
        \Illuminate\Support\Facades\View::composer(['*'] , streets::class);
        \Illuminate\Support\Facades\View::composer(['*'] , address_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , all_item_card::class);
        \Illuminate\Support\Facades\View::composer(['*'] , my_basket::class);
        \Illuminate\Support\Facades\View::composer(['*'] , message_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , user::class);
        \Illuminate\Support\Facades\View::composer(['*'] , addresses::class);
        \Illuminate\Support\Facades\View::composer(['*'] , attr_filter::class);
        \Illuminate\Support\Facades\View::composer(['*'] , title_filter::class);
        \Illuminate\Support\Facades\View::composer(['*'] , card_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , message::class);
        \Illuminate\Support\Facades\View::composer(['*'] , user_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , comment_all_panel_admin::class);
        \Illuminate\Support\Facades\View::composer(['*'] , factor_all::class);
        \Illuminate\Support\Facades\View::composer(['*'] , products_all_admin::class);
        \Illuminate\Support\Facades\View::composer(['*'] , sub_ll_menu::class);
        \Illuminate\Support\Facades\View::composer(['*'] , test::class);
        \Illuminate\Support\Facades\View::composer(['*'] , factor::class);
    }
}
