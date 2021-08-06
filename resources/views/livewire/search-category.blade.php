<div>
    <h4 class="card-title">
        <span class="mr-1">Danh mục</span>/
        <a href="{{ route('category.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i
                    class="fa fa-plus"></i></span>
        </a>
        <div class="col-lg-3 float-right">
            <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo tên..." wire:model="searchTerm"
                   aria-label="Search Dashboard">
        </div>
    </h4>
    {!! Toastr::message() !!}
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td style="text-transform: capitalize">{{ $item->name }}</td>
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
                            <a href="{{ route('category.edit', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="Sửa">
                                <i class="fa fa-pencil color-muted m-r-5"></i>
                            </a>
                            <a href="{{ route('category.delete', $item->id) }}"
                               data-toggle="tooltip" data-placement="top" title=""
                               data-original-title="Xoá">
                                <i class="fa fa-close color-danger ml-3"></i>
                            </a>
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $category->links('livewire.livewire-pagination')}}
</div>
