<x-app-layout>
<section class="wsus__product_details mt_170 mb_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5 wow fadeInLeft">
                <div class="wsus__product_details_slider_area">
                    <div class="row slider-forFive">
                        <div class="col-xl-12">
                            <div class="wsus__product_details_slide_show_img">
                                <img src="{{ asset('assets/images/product_slide_show_1.jpg') }}" alt="product" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__product_details_slide_show_img">
                                <img src="{{ asset('assets/images/product_slide_show_2.jpg') }}" alt="product" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                    <div class="wsus__product_details_slider">
                        <div class="row slider-navFive">
                            <div class="col-xl-2">
                                <div class="wsus__product_details_slider_img">
                                    <img src="{{ asset('assets/images/product_slider_1.jpg') }}" alt="product" class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="wsus__product_details_slider_img">
                                    <img src="{{ asset('assets/images/product_slider_2.jpg') }}" alt="product" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7 wow fadeInRight">
                <div class="wsus__product_summary">
                    <h2>Black Sneakers</h2>
                    <span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <b>8k+ reviews</b>
                    </span>
                    <h6>$120.00</h6>
                    <p>From sleek racing flats to burly hiking boots, there are plenty of options to keep your feet
                        comfortable during any activity. Read on to learn how to determine the right athletic shoes.
                    </p>

                    <h6 class="mt_30">Color</h6>
                    <select class="select_2" name="state">
                        <option value="AL">Select Color</option>
                        <option value="">Red</option>
                        <option value="">Yellow</option>
                        <option value="">Blue</option>
                        <option value="">Green</option>
                        <option value="">Yellow</option>
                    </select>


                    <div class="wsus__product_add_cart">
                        <div class="wsus__product_quantity">
                            <button class="minus" type="submit"><i class="far fa-minus"></i></button>
                            <input type="text" placeholder="01">
                            <button class="plus" type="submit"><i class="far fa-plus"></i></button>
                        </div>
                        <div class="wsus__buy_cart_button">
                            <a href="#" class="cart"><img src="images/cart_icon_black.svg" alt="cart"
                                    class="img-fluid w-100"></a>
                            <a href="cart.html" class="common_btn">Buy Now</a>
                        </div>
                    </div>
                    <ul class="wishlist d-flex flex-wrap">
                        <li><a href="#"><span><i class="fal fa-heart"></i></span>ADD TO WISHLIST</a></li>
                        <li><a href="#"><span><i class="fal fa-share-alt"></i></span>SHARE</a></li>
                    </ul>
                    <ul class="details">
                        <li>SKU:<span>GM90876</span></li>
                        <li>Categories:<span>Casual, walk, run, brand</span></li>
                        <li>Tags:<span>gym, health, run, style</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="wsus__product_details_menu_contant">
                    <div class="wsus__product_description wow fadeInUp">
                        <p>Knowing how to pick the right types of athletic shoes can be a challenge—enter
                            our athletic shoe buying guide! First, we'll explain how to measure your shoe
                            size to make sure your footwear fits properly. Next, we'll cover the differences
                            between road running, trail running, hiking and walking shoes to help you pick
                            the best ones for your terrain. Finally, we'll dive into specifics on
                            weightlifting, court and cross-training kicks.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-app-layout>
