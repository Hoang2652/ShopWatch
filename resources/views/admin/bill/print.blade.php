<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hóa Đơn Mua Hàng</title></head>
<body onLoad="window.print()">
<div id="wrapper" style="margin:0 auto; width:500px;">
<table width="100%">
                <tr>
                  <td height="25" valign="top"align="center"><div align="left">
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td width="5" height="95">&nbsp;</td>
                       
                          <td width="343"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                <tr>
                                  <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td colspan="2"><strong>CỦA HÀNG BÁN ĐỒNG HỒ TRỰC TUYẾN PHONG HẤP</strong></td>
                                        </tr>
                                        <tr>
                                          <td>Địa chỉ</td>
                                          <td>: Đăng Văn Ngữ - Phú Nhuận - Thành phố Hồ Chí Minh</td>
                                        </tr>
                                        <tr>
                                          <td>Di Động </td>
                                          <td>: 0938909944</td>
                                        </tr>
                                        <tr>
                                          <td>Email</td>
                                          <td>:hieutran@gmail.com</td>
                                        </tr>
                                      </tbody>
                                  </table></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                    </table>
                  </div></td>
                </tr>
  <tr>
                  <td width="562" height="25" valign="top"align="center">  <hr>
                    <strong><font color="#FF0000" size="+2">HÓA ĐƠN XUẤT HÀNG</font></strong></td>
  </tr>
                <tr>
                  <td height="54"  >                    
                      <div align="left">
                        <b>Thông tin Khách hàng:</b>
                      </div>
              <table width="100%" >
                            <tr>
                              <td width="3%" >&nbsp;</td>
                              <td width="34%" >Họ tên:</td>
                              <td width="63%" >  {{ $BillInfo->hoten }}   </td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Địa chỉ :</td>
                              <td >{{ $BillInfo->diachi }}</td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Điện thoại :</td>
                              <td >{{ $BillInfo->dienthoai }}</td>
                            </tr>
                          
                            <tr>
                              <td>&nbsp;</td>
                              <td>Email : </td>
                              <td >{{ $BillInfo->email }} </td>
                            </tr>

                            <tr>
                              <td >&nbsp;</td>
                              <td >Ngày tạo đơn:</td>
                                    
			
                              <td >{{ date_format(date_create($BillInfo -> created_at),"d-m-Y") }}</td>
                            </tr>
                          <tr>
                        <td >&nbsp;</td>
                        <td ><span class="style3">Phương thức thanh toán:</span></td>
                        <td >
                          {{ $BillInfo->phuongthucthanhtoan }}
                        </td>
                      </tr>
                    </table>
        <br />
        <span class="style3"><B>Thông tin về đơn đặt hàng : </B></span>
        <table width="100%" style="border-collapse:collapse;">
          <tr>
            <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">STT</div></td>
            <td width="30%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tên hàng</div></td>
            <td width="25%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Giá</div></td>
            <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Số lượng</div></td>
            <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Giảm giá</div></td>
            <td width="25%" align="right" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tổng cộng</div></td>
          </tr>
        <tr>
          @php 
            $stt = 0; 
            $TotalBill = 0;
            $TotalPrice = 0;
          @endphp
          @foreach ($BillDetail as $row)
          <td align="left" style="border:1px solid green;">{{ $stt++ }}</td>
          <td  align="left" style="border:1px solid green;"><div align="center">{{ $row->tensanpham }}</div></td>
          <td align="center" align="left" style="border:1px solid green;"> {{ number_format(($row->gia),"0",",",".") }} VNĐ</td>
          <td align="center"  align="left" style="border:1px solid green;">{{ $row->soluong }}</td>
          <td align="center"  align="left" style="border:1px solid green;"> @if($row->giamgia == null) 0 @else {{ $row->giamgia }} @endif %</td>
          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($TotalBill = $row->soluong * $row->gia * (100 - $row->giamgia)/100,"0",",",".")?> VNĐ</td>
        </tr>
        @php $TotalBill += $TotalPrice; @endphp
        @if($row->quatang != null)
        <tr style="border:1px solid green;">
            <td align="left" colspan='6'> Quà tặng: {{ $row->tenquatang }}</td>
        </tr>
        @endif
          @endforeach
        <tr style="border:1px solid green;">
          <td colspan="5" align="left"><div align="right">Tổng giá trị đơn hàng:</div></td>
          <td align="right" ><b><?php echo number_format($TotalBill,"0",",",".") ?> VNĐ</b></td>
        </tr>     
		
      </table>
		  
              <table width="452" border="0" align="right">
                            <tr>
                              <td colspan="3"><div align="right"> Ngày <?php echo date("d/m/Y");?></div></td>
                            </tr>
                            <tr>
                              <td><div align="center"><strong>Nhân viên Bán hàng</strong></div></td>
                              <td>&nbsp;</td>
                              <td><div align="center"><strong>Khách hàng</strong></div></td>
                            </tr>
                            <tr>
                              <td height="23"><div align="center">(Ký tên, Đóng dấu Công ty)</div></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="73">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                           
                          </table>
                    <p>&nbsp;</p>
	                      <p><br>
                                      </p>
                    </td>
                </tr>
</table>
</div>
</body>
</html>
