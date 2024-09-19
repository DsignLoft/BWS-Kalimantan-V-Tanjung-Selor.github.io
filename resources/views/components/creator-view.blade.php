@props(['creatorList'])
@foreach($creator_list as $cl)
    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
        <div class="vendor-wrap style-2 mb-40">
            <div class="product-badges product-badges-position product-badges-mrg">
                <span class="hot">Mall</span>
            </div>
            <div class="vendor-img-action-wrap">
                <div class="vendor-img">
                    <a href="vendor-details-1.html">
                        <img class="default-img" src="assets/imgs/vendor/vendor-1.png" alt="" />
                    </a>
                </div>
                <div class="mt-10">
                    <span class="font-small total-product">380 products</span>
                </div>
            </div>
            <div class="vendor-content-wrap">
                <div class="mb-30">
                    <div class="product-category">
                        <span class="text-muted">Since 2012</span>
                    </div>
                    <h4 class="mb-5"><a href="vendor-details-1.html">Nature Food</a></h4>
                    <div class="product-rate-cover">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                        </div>
                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                    </div>
                    <div class="vendor-info d-flex justify-content-between align-items-end mt-30">
                        <ul class="contact-infor text-muted">
                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                        </ul>
                        <a href="vendor-details-1.html" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!--end vendor card-->