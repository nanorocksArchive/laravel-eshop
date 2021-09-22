<section class="navbar main-menu" >
    <div class="navbar-inner main-menu" style="height: 50px;">
        <a href="/" class="logo pull-left"><img src="{{ asset('themes/images/logo.png') }}" class="site_logo" alt=""></a>
        <nav id="menu" class="pull-right">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/shop?category=">Categories</a>
                    <ul>
                        <li><a href="/shop?category=">Summer clothes</a></li>
                        <li><a href="/shop?category=">Casual clothes</a></li>
                        <li><a href="/shop?category=">Nightgowns</a></li>
                        <li><a href="/shop?category=">Sport</a></li>
                    </ul>
                </li>

                <li><a href="/shop?category=">Top products</a>
                    <ul>
                        <li><a href="./products.html">Popular</a></li>
                        <li><a href="./products.html">Top seller</a></li>
                        <li><a href="./products.html">Most bayed</a></li>
                    </ul>
                </li>
                <li><a href="/about">About</a></li>
                <li><a href="./products.html">Contact</a></li>
                <li>
                    <form method="POST" class="search_form" style="margin-top: 5px">
                        <input type="text" class="input-block-level search-query" Placeholder="eg. sku, slug, name ...">
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</section>

