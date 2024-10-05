<div class="site-section site-section-sm pb-0">
    <div class="container">
    <div class="row">
        <form class="form-search col-md-12" style="margin-top: -100px;">
            <div class="row align-items-end">
                <div class="col-md-3">
                    <label for="list-types">Listing Types</label>
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select id="list-types" name="list-types" class="form-control d-block rounded-0">
                            <option value="Condo">Condo</option>
                            <option value="Comercial Building">Commercial Building</option>
                            <option value="Property Land">Land
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="offer-types">Offer Type</label>
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select id="offer-types" name="offer-types" class="form-control d-block rounded-0">
                            <option value="Sale">For Sale</option>
                            <option value="Rent">For Rent</option>
                            <option value="Lease">For Lease</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
            <div class="mr-auto">

            </div>
            <div class="ml-auto d-flex align-items-center">
            <div>
                <a href="{{ route('properties')}}" class="view-list px-3 border-right active">All</a>
                <a href="{{ route('rent')}}" class="view-list px-3 border-right">Rent</a>
                <a href="{{ route('buy')}}" class="view-list px-3">Sale</a>
            </div>


            <div class="select-wrap">
                <span class="icon icon-arrow_drop_down"></span>
                <select id="sort-options" class="form-control form-control-sm d-block rounded-0">
                    <option value="">Sort by</option>
                    <option value="asc">Price Ascending</option>
                    <option value="desc">Price Descending</option>
                </select>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>
</div>
