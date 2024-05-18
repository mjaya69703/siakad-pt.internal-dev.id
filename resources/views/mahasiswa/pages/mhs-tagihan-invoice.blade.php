<!DOCTYPE html>
<html lang='en' class=''>

<head>

  <meta charset='UTF-8'>
  <title>CodePen Demo</title>

  <meta name="robots" content="noindex">

  <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
  <link rel="mask-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
  <link rel="canonical" href="https://codepen.io/zarbyasir/pen/ZEYGNVw">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">

  <style id="INLINE_PEN_STYLESHEET_ID">
    /*
    Colors
    rgb(249, 99, 50); orange flame
    rgb(255, 77, 77); red
    rgb(198, 89, 99); red'ish
    */

    @page {
    bleed: 1cm;
    size: A4 portrait;
        size:  auto;   /* auto is the initial value */
        margin-left: 0mm;  /* this affects the margin in the printer settings */
        margin-bottom: 0mm;
        margin-top: 0mm;

    html
    {
        background-color: #FFFFFF;
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        border: solid 1px blue ;
        margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
    }
    }

    @media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
    }

    body {
    background: #eee;
    font-familly: roboto;
    -webkit-print-color-adjust: exact !important;
    }

    div.container {
    border-radius: 15px;
    background: white;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    }

    div.invoice-letter{
    min-height: 150px;
    background-color: #04617B;
    box-shadow: 0 4px 3px rgba(0,0,0,0.4);
    }



    table.invoice thead th{
    background-color: rgba(4, 97, 123, 0.2);
    border-top: none;
    }

    table.invoice thead tr:first-child th:first-child{
        border-top-left-radius: 10px;
    }

    table.invoice thead tr:first-child th:last-child{
    border-top-right-radius: 10px;
    }

    tr.last-row{
    background-color: rgba(4, 97, 123, 0.2);
    font-size: 16px;

    }

    tr.last-row th{
    border-bottom-left-radius: 10px;
    width: 30px;
    font-size: 16px;

    }

    tr.last-row td{
    border-bottom-right-radius: 10px;
    font-size: 16px;
    }

    div.row div.to{
    height: 260px;
    /* padding-right: 25px; */
    border-right: 2px solid rgba(4, 97, 123, 0.2);
    }
  </style>


</head>

<body>
  <div class="container my-5 px-5 py-5">
    <table style="width: 100%;">
        <tr>
            <td style="width: 33%;">
                <h5>Esec Academy</h5>
                <h6><em>Jakarta, Indonesia</em></h6>
                <p>Jl. Ciremai Raya No 240 Kota Jakarta Selatan</p>
            </td>
            <td style="width: 32%; text-align: center;">
                <img width="125px" height="125px" src="{{ asset('storage/images/web/site-logo.png') }}" alt="Logo">
            </td>
            <td style="width: 35%; text-align: left;">
                <h6>Invoice #<span style="text-transform: uppercase">{{ $history->tagihan_code }}</span></h6>
                <h6>Issued at: {{ \Carbon\Carbon::parse($history->created_at)->format('d M Y') }}</h6>
                <h3 style="color: #15ff00;">PAID</h3>
            </td>
        </tr>
    </table>


    <div class="container-fluid invoice-letter mt-3" style="padding: 0px; border-radius: 10px;">
        <table style="width: 100%;" class="invoice-letter mt-3">
            <tr>
                <td style="width: 30%; background-color: #04617B; color: white; border-radius: 10px; padding: 5px;">
                    <p>Summary and Notes</p>
                </td>
                <td style="width: 70%; background-color: #04617B; color: white; border-radius: 10px; padding: 5px;">
                    <p>{{ $history->tagihan->name }} <br> {{ $history->tagihan->desc }}</p>
                </td>
            </tr>
        </table>
    </div>




   <div class=" table mt-5">
      <table class="invoice table table-hover">
         <thead class="thead">
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Item</th>
               <th scope="col">Qty.</th>
               <th scope="col">Amount</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td class="item">Pembayaran {{ $history->tagihan->name }}</td>
               <td>1</td>
               <td>Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}</td>
            </tr>
         </tbody>
      </table>
   </div>

   <table style="width: 100%;">
    <tr>
        <!-- invoiced to details -->
        <td style="width: 50%;">
            <div class="to text-left">
                <span style="font-weight: 500; font-size: 16px">
                    Invoiced to: <br>
                    <b style="font-size: 18px">{{ $history->users->mhs_name }}</b> <br>

                </span>
                <span style="font-weight: 500; font-size: 16px">
                    {{ $history->users->mhs_addr_kota == null ? 'Nama Kota' : $history->users->mhs_addr_kota }}, {{ $history->users->mhs_addr_provinsi == null ? 'Nama Provinsi' : $history->users->mhs_addr_provinsi }} <br>
                </span>
                <span style="font-weight: 500; font-size: 14px;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio, fuga.</span>
            </div>
        </td>
        <!-- Invoice assets and total -->
        <td style="width: 50%;">
            <table class="table table-borderless text-left">
                <tbody>
                    <tr>
                        <th scope="row">Subtotal</th>
                        <td>Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="last-row">
                        <th scope="row">
                            Total
                        </th>
                        <td>
                            Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <span style="color: red;font-size: 14px;">Due date: {{ \Carbon\Carbon::parse($history->created_at)->addDays(3)->format('d M Y H:i:s') }}</span>

        </td>
    </tr>
   </table>

   <p class="text-center mt-3">ESEC Academy - SiakadPT By Internal Developer</p>
</div>


</body>

</html>
