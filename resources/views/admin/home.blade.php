@extends('admin_masterlayout')
@section('home')
<div id="admincon">
    <div id="sanphammoi">
        <div class='sanphammoitheongay'>Đơn hàng cần được xử lý</div>
        <div class="scb" style="border-radius: 10px; box-shadow: 0 8px 20px rgb(35 0 77 / 20%); overflow: auto; height: 500px">
            <table class="table" style=" border: 1px solid hsl(0, 0%, 80%); background-color: #fff; margin: 0">
                <thead class="tieudespmoi">
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Ngày đặt hàng</th>
                </thead>
                <tbody>
                    @foreach($getBillByPage as $row)
                    <tr>
                        <td>-></td>
                        <td>{{ $row -> hoten }}</td>
                        <td>{{ $row -> diachi }}</td>
                        <td>{{ $row -> dienthoai }}</td>
                        <td>{{ date_format(date_create($row -> created_at),"d-m-Y") }}</td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
        </div>
        <nav aria-label="page navigation">
            {{  $getBillByPage -> appends(request()->all())->links() }}
        </nav>
        <div style="padding: 20px; height: 5rem; text-align: center; margin-bottom: 5rem;"><a href="admin.php?admin=hienthihd" class="btn btn-primary" style="padding: 0.725rem 2.5rem; border-radius: 0.5rem;">Chi tiết</a></div>
    </div>
</div>
@endsection