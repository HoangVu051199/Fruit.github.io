<div>
    <h4 class="card-title">
        <span class="mr-1">Slider</span>/
        <a href="{{ route('slider.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
        </a>
        <div class="col-lg-3 float-right">
            <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo vị trí..." wire:model="searchTerm"
                   aria-label="Search Dashboard">
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Vị trí</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slider as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <img class="img-thumbnail" style="width: 100px; height: 50px" src="{{ $item->image }}">
                    </td>
                    <td>{{ $item->position }}</td>
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
                                                <a href="{{ route('slider.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                <a href="{{ route('slider.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                                    <i class="fa fa-close color-danger ml-3"></i>
                                                </a>
                                            </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $slider->links('livewire.livewire-pagination') }}
</div>
