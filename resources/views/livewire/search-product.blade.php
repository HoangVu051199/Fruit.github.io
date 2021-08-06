<div>
    <h4 class="card-title">
        <span class="mr-1">Sản phẩm</span>/
        <a href="{{ route('product.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
        </a>
        <div class="col-lg-3 float-right">
            <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo tên, giá..." wire:model="searchTerm"
                   aria-label="Search Dashboard">
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Loại danh mục</th>
                <th scope="col">Giá</th>
                <th scope="col">Đơn vị tính</th>
                <th scope="col">Nổi bật</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <img class="img-thumbnail" width="70px" src="{{ $item->image }}">
                    </td>
                    <td style="text-transform: capitalize">{{ $item->name }}</td>
                    <td style="text-transform: capitalize">
                        {{ $item->category->name }}
                    </td>
                    <td class="text-danger">{{ number_format($item->price, 0,'.','.') }}</td>
                    <td style="text-transform: capitalize">
                        {{ $item->unit->name }}
                    </td>
                    <td>
                        <span class="label gradient-1 btn-rounded">
                            @if($item->hot == 0)
                                                        Ẩn
                                                    @else
                                                        Hiển thị
                                                    @endif
                                                </span>
                    </td>
                    <td>
                                                <span class="label gradient-1 btn-rounded">
                                                    @if($item->status == 0)
                                                        Ẩn
                                                    @else
                                                        Hiển thị
                                                    @endif
                                                </span>
                    </td>
                    <td>
                                            <span>
                                                <a href="{{ route('product.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                <a href="{{ route('product.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                                    <i class="fa fa-close color-danger ml-3"></i>
                                                </a>
                                            </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $product->links('livewire.livewire-pagination') }}
</div>
