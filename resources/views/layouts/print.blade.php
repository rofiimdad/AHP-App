
<!DOCTYPE html>
<html>

<head>
  <style>
      /* Styles go here */

.page-header, .page-header-space {
  height: 100px;
}

.page-footer, .page-footer-space {
  height: 50px;

}

.page-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  border-top: 1px solid black; /* for demo */
  background: yellow; /* for demo */
}

.page-header {
  position: fixed;
  top: 0mm;
  width: 100%;
  border-bottom: 1px solid black; /* for demo */
  background: yellow; /* for demo */
}

.page {
  page-break-after: always;
}

@page {
  margin: 20mm
}

@media print {
   thead {display: table-header-group;}
   tfoot {display: table-footer-group;}

   button {display: none;}

   body {margin: 0;}
}
  </style>
</head>

<body>

  <div class="page-header" style="text-align: center">
    CV. DOLOPO Grosir
    <br/>
    <button type="button" onClick="window.print()" style="background: pink">
      PRINT!
    </button>
  </div>

  <div class="page-footer">
    Jalan Madiun-Ponorogo Dolopo Madiun
  </div>

  <table>

    <thead>

        <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <!--*** CONTENT GOES HERE ***-->
            <div class="page" style="line-height: 3;">
                <table style="undefined;table-layout: fixed; width: 537px" border="1">
                    <colgroup>
                    <col style="width: 100px">
                    <col style="width: 94px">
                    <col style="width: 97px">
                    <col style="width: 246px">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>Periode Gaji</th>
                        <th colspan="3">{{$data->period}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Nama</td>
                        <td colspan="3">{{$data->name}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td colspan="3">{{$data->address}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td colspan="3">{{$data->position}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">Detail</td>
                        <td>Nominal</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td colspan="2">Gaji Pokok</td>
                        <td style="text-align: right">{{$data->value}}</td>
                    </tr>
                    @if ($data->bonus_value == null)
                    <tr>
                        <td>2</td>
                        <td colspan="2">Bonus</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td colspan="3">Total</td>
                        <td style="text-align: right">{{$data->value}}</td>
                    </tr>
                    @else

                    <tr>
                        <td>2</td>
                        <td colspan="2">Bonus</td>
                        <td style="text-align: right">{{$data->bonus_value}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">Total</td>
                        <td style="text-align: right">{{$data->value + $data->bonus_value}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>

</body>

</html>
