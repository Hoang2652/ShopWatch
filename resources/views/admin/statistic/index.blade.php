@extends('admin_masterlayout')
@section('statistic')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<div class="quanlysp">
	<h3>THỐNG KÊ DOANH THU</h3>
    <div class="card col-md-11">
        <div class="card-header row">
            <div class=" row col-sm-5">
                <label for="inputCity" class="col-sm-4 col-form-label">Từ:</label>
                <input type="date" class="form-control col-sm-8" id="inputfromdate">
            </div>
            <div class=" row col-sm-5">
                <label for="inputState" class="col-sm-4 col-form-label">Đến:</label>
                <input type="date" class="form-control col-sm-8" id="inputtodate" name="khoangthoigian">
            </div>
            <div class=" col-sm-2">
                <button id="btn-thongke" class="btn btn-primary" style="display: inline-block;">Thống kê</button>
            </div>
        </div>
        <div class="card-body chart-responsive">
            <div id="doanhthuchart" style="height: 250px;"></div>
        </div>
        <div class="card-footer row">
            Biểu đồ thống kê doanh thu: <span id="tenchart-change" style="margin-left:5px;"> toàn thời gian</span>
        </div>
      </div>
    {{-- <div class="khungbang" style="margin-top: 20px;">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCity">Từ ngày:</label>
                    <input type="date" class="form-control" id="inputfromdate">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Dến ngày:</label>
                    <input type="date" class="form-control" id="inputtodate" name="khoangthoigian">
                </div>
                <div class="form-group col-md-2" style="margin-top:32px;">
                <button id="btn-thongke" class="btn btn-primary" style="display: inline-block;">Thống kê</button>
                </div>
            </div>
        <div id="doanhthuchart" style="height: 250px;"></div>
        <div id="tenchart" style="display:inline-block;">Biểu đồ thống kê doanh thu:</div>
        <div id="tenchart-change" style="display:inline-block; padding-left:10px;"></div>.
    </div> --}}
</div>


<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
        }
    });
                    
    function ngaythangnam(namthangngay){
                if(namthangngay!="")
                {
                var datearr = namthangngay.split("-", 3);
                var ntn = datearr[2]+"-"+datearr[1]+"-"+datearr[0];
                }		
                return ntn;
                
            }

            var chart = new Morris.Area({
                element: 'doanhthuchart',

                data:[{date: "Hôm nay chưa có doanh thu", sales: 0}],

                xkey: 'date',

                ykeys: ['sales'],

                fillOpacity: 0.4,

                labels: ['Doanh thu'],

                xLabelFormat: function (d) {
                    return ("0" + d.getDate()).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d.getFullYear();
                }
            });
            taixongthongke();

            function taixongthongke(){
                $.ajax({
                    url:"/phonghap/admin/statistic/profit",
                    method:"POST",
                    dataType:"JSON",
                    data:{},
                    success:function(data) {
                        chart.setData(data);
                    }
                });
            }

            $('#btn-thongke').click(function(){
                var inputfromdate =  document.getElementById('inputfromdate').value;
                var inputtodate =  document.getElementById('inputtodate').value;
                $('#tenchart-change').text(' Từ ngày '+ngaythangnam(inputfromdate)+' đến ngày '+ngaythangnam(inputtodate));
                $.ajax({
                    url:"/phonghap/admin/statistic/profit",
                    method:"POST",
                    dataType:"JSON",
                    data:{fromDate: inputfromdate, toDate: inputtodate},

                    success:function(data) {
                        chart.setData(data);
                    }
                });
            });
        });        
</script>
@endsection