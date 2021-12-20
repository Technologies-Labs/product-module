<div class="tab-content">
    @php
    use Modules\Product\Enum\ProductEnum;
    @endphp
    <div id="list-view" class="tab-pane fade active show" wire:ignore.self>
        @foreach ($products as $product)
        <livewire:product::show-product :user='$product->user' :product='$product' :cart='$cart' :items='$items'
            :isCurrantUser='($currantUser) ? $product->user->id == $currantUser->id : false' :favorites="$favorites"
            :wire:key="md5(rand()).$product->name" />
        @endforeach


    </div>

    <div id="grid-view" class="tab-pane fade"  wire:ignore.self>
        <div class=" main-wraper" id="product">
            <div uk-filter="target: .js-filter">
                {{-- <ul class="uk-subnav uk-subnav-pill">
                    <li class="uk-active" uk-filter-control><a href="#">All</a></li>
                    <li uk-filter-control="[data-color='phones']"><a href="#">Phones</a></li>
                    <li uk-filter-control="[data-color='accessories']"><a href="#">Accessories</a></li>
                    <li uk-filter-control="[data-color='repairs']"><a href="#">Repairs</a></li>
                    <li uk-filter-control="[data-color='spare-parts']"><a href="#">Spare Parts</a></li>
                </ul> --}}

                <div class="row js-filter uk-child-width-1-2 uk-child-width-1-3@m">
                    @foreach ($products as $product)
                    <div data-color="phones" class="col-lg-4 col-md-4 col-sm-6" id="single-product">

                        @livewire('user::user.user-header-information', ['user' => $product->user , 'product' =>
                        $product ], key(md5(rand()).$product->name))

                        <div class="uk-card uk-card-default uk-card-body friendz">
                            <figure class="uk-inline uk-margin">
                                <img src="{{ asset('storage') }}/{{ProductEnum::IMAGE.$product->image}}" alt="">
                                @if ($product->is_offer)
                                <em id="discount">{{$product->offer_ratio}}%</em>
                                @endif

                            </figure>
                            <!-- <p class="details">Lorem ipsum dolor sit, amet consectetur consectetur</p> -->
                        </div>
                        <span id="product-name"><a href="{{ route('show.product', ['product'=>$product]) }}"
                                title="">{{$product->name}}</a></span>
                        <p class="product-single__price ">
                            <span>
                                <span class="new-price">
                                    YER{{$product->price}}
                                </span>
                                @empty(!$product->old_price)
                                <s class="old-price">
                                    YER{{$product->old_price}}
                                </s>
                                @endempty

                            </span>
                        </p>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <div x-data="{
        observe() {
            let observer = new IntersectionObserver((entries) => {
            console.log(entries)
            entries.forEach(entry => {
                if (entry.isIntersecting)
                {
                    @this.call('loadMore')
                }
               })
            },{
               root: null
            })
                observer.observe(this.$el)
        }
    }" x-init="observe">

    </div>
    @if($products->hasMorePages())
    @include('components.loading')
    @endif
</div>
