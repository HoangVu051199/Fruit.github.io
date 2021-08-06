<div>
    <h4 class="card-title">
        <span class="mr-1" style="line-height: 45px">Đơn hàng huỷ</span>
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
                <?php $key=0; ?>
            @foreach($countermand as $item)
                @if($item->status == 3)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td style="text-transform: capitalize">{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_email }}</td>
                    <td>{{ $item->customer_phone }}</td>
                    <td>2021-06-15 10:04:27</td>
                    <td>
                        <span class="label gradient-1 btn-rounded">
                            Đã huỷ
                        </span>
                    </td>
                    <td>
                    <span>
                    <!-- <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                    <i class="fa fa-pencil color-muted m-r-5"></i>
                    </a> -->
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
    {{ $countermand->links('livewire.livewire-pagination') }}
</div>
