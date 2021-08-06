<div>
    <h4 class="card-title">
        <span class="mr-1">Đơn vị tính</span>/
        <a href="{{ route('unit.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
        </a>
        <div class="col-lg-3 float-right">
            <input type="search" class="form-control rounded" placeholder="Search Category" wire:model="searchTerm"
                   aria-label="Search Dashboard">
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên đơn vị tính</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($unit as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td style="text-transform: capitalize">{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                                            <span>
                                                <a href="{{ route('unit.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                <a href="{{ route('unit.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                                    <i class="fa fa-close color-danger ml-3"></i>
                                                </a>
                                            </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $unit->links('livewire.livewire-pagination') }}
</div>
