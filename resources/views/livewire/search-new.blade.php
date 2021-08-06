<div>
    <h4 class="card-title">
        <span class="mr-1">Bài viết</span>/
        <a href="{{ route('new.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
        </a>
        <div class="col-lg-3 float-right">
            <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo tiêu đề, nội dung..." wire:model="searchTerm"
                   aria-label="Search Dashboard">
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($new as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <img class="img-thumbnail" width="70px" src="{{ $item->image }}">
                    </td>
                    <td style="text-transform: capitalize">{{ $item->title }}</td>
                    <td style="text-transform: capitalize">
                        <?php $cate_new = DB::table('cate_new')->where('id',$item->catenew_id)->first(); ?>
                        @if (!empty($cate_new->name))
                            {!! $cate_new->name !!}
                        @else
                            {!! NULL !!}
                        @endif
                    </td>
                    <td>
                        <textarea class="form-control" id="content" name="contents" rows="6" readonly>{{ $item->content }}</textarea>
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
                                                <a href="{{ route('new.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                <a href="{{ route('new.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                                    <i class="fa fa-close color-danger ml-3"></i>
                                                </a>
                                            </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $new->links('livewire.livewire-pagination') }}
</div>
