<div class="modal fade" id="review{{ $id_o }}" tabindex="-1" role="dialog" aria-labelledby="reviewTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaksiModalTitle"><b>Review Produk</b></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-sr-cross"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('review.product') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth()->user()->id_customer }}" />
                    <input type="hidden" name="id_order" value="{{ $order->id_order }}" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><h6>Produk<span style="color: red;">*</span></h6></label>
                                <x-select2 name="id_product" id="id_product" class="form-control">
                                    @foreach (json_decode($order->items) as $id_i => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </x-select2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><h6>Rating<span style="color: red;">*</span></h6></label>
                                <x-select2 name="rating" id="rating" class="form-control">
                                    <option value="1">&#10025; (1)</option>
                                    <option value="2">&#10025;&#10025; (2)</option>
                                    <option value="3">&#10025;&#10025;&#10025; (3)</option>
                                    <option value="4">&#10025;&#10025;&#10025;&#10025; (4)</option>
                                    <option value="5">&#10025;&#10025;&#10025;&#10025;&#10025; (5)</option>
                                </x-select2>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label><h6>Ulasan<span style="color: red;">*</span></h6></label>
                                <textarea rows="8" name="review" placeholder="Ketik ulasan anda mengenai pelanan atau hasil produk kami.."></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="margin-top: 8px;"> Review Produk </button>
                </form>
            </div>
        </div>
    </div>
</div>
