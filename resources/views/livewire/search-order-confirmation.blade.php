<div>
    <h4 class="card-title">
        <span class="mr-1" style="line-height: 45px">Chờ xác nhận</span>
        <div class="col-lg-3 float-right">
            <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo tên..." wire:model="searchTerm"
                   aria-label="Search Dashboard">
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên người đặt</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
                <?php $key=1; ?>
            @foreach($confirmation as $item)

                @if($item->status == 0)
                <tr>
                    <td>{{ $key++ }}</td>
                    <td style="text-transform: capitalize">{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_email }}</td>
                    <td>{{ $item->customer_phone }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <span class="label gradient-1 btn-rounded">
                            Chờ xử lý
                        </span>
                    </td>
                    <td>
                    <span>
                    <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                    <i class="fa fa-pencil color-muted m-r-5"></i>
                    </a>
                    <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chi tiết">
                    <i class="fa fa-eye color-danger ml-3"></i>
                    </a>
                    </span>
                    </td>
                </tr> 
                @endif   
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $confirmation->links('livewire.livewire-pagination') }}
</div>
