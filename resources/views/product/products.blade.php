@extends('layouts.main')
@section('main')
    <main>
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container-fluid">
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Produk</li>
                </ol>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h2>
                            Produk
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form method="GET" id="myForm">
                            @csrf
                            <select class="form-control" name="sort" id="sort" style="float: right;width:175px">
                                <option value="name,asc">Urutkan : A - Z</option>
                                <option value="name,desc">Urutkan : Z - A</option>
                                <option value="min_price,asc">Termurah</option>
                                <option value="min_price,desc">Termahal</option>
                                <option value="best_seller_sum_qty,desc">Terlaris</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="category" class="category">
            <div class="container-fluid">
                <x-alert />
                @if ($products != [])
                    <div class="product-list">
                        <x-product-view :products="$products" />
                    </div>
                    <hr>
                    {{ $products->links() }}
                @endif
                @if ($products->count() == 0)
                    <div style="text-align: center;font: 24px bold">Produk tidak ditemukan</div>
                @endif
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            let sort = "<?= $sort ?>";
            $("#sort").on('change', function() {
                $('#myForm').submit();
            });

            $("#sort").val(sort).find(`option[value="${sort}"]`).attr('selected', true);
        });
    </script>
@endsection
