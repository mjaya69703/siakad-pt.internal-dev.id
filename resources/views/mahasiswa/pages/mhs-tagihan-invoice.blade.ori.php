
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
    width: auto;
    position: relative;
    min-height: 150px;
    background-color: #04617B;
    margin-right: -48px;;
    margin-left: -48px;
    box-shadow: 0 4px 3px rgba(0,0,0,0.4);
    }

    div.letter-title{
    margin-top: 10px;
    height: 130px;
    border-right: 2px solid #eee;
    }

    div.letter-content{
    margin-top: 10px;
    }

    table.invoice thead th{
    background-color: rgba(4, 97, 123, 0.2);
    border-top: none;
    }

    table.invoice thead tr:first-child th:first-child{
        border-top-left-radius: 25px;
    }

    table.invoice thead tr:first-child th:last-child{
    border-top-right-radius: 25px;
    }

    tr.last-row{
    background-color: rgba(4, 97, 123, 0.2);

    }

    tr.last-row th{
    border-bottom-left-radius: 25px;
    width: 30px;
    }

    tr.last-row td{
    border-bottom-right-radius: 25px;
    }

    div.row div.to{
    height: 260px;
    padding-right: 25px;
    border-right: 2px solid rgba(4, 97, 123, 0.2);
    }
  </style>


</head>

<body>
  <div class="container my-5 px-5 py-5">
   <div class="row">
      <div class="col-3 contact-details">
         <h5>Esec Academy</h5>
         <h6><em>Jakarta, Indonesia</h6>
         <p>Jl. Ciremai Raya No 240 Kota Jakarta Selatan</em></p>
      </div>
      <div class="col-1 offset-2 logo">
         <img width="125px" height="125px" src="{{ asset('storage/images/web/site-logo.png') }}" />
      </div>
      <div class="invoice-details col-3 offset-3 text-right">

         <h6>Invoice No. #<span style="text-transform: uppercase;">{{ $history->tagihan_code }}</span></h6>
         <h6>Issued at: {{ \Carbon\Carbon::parse($history->created_at)->format('d M Y H:i:s') }}</h6>
         <h1 style="color: #15ff00;">PAID</h1>

      </div>
   </div>

   <div class="container-fluid invoice-letter mt-3">
      <div class="row">
         <div class="col-3 text-white pl-5 py-2 letter-title">
            <h5>Summary & Notes</h5>
         </div>
         <div class="col-9 text-white pr-5 py-2 letter-content">
            <p>{{ $history->tagihan->name }} <br> {{ $history->tagihan->desc }}</p>
         </div>
      </div>
   </div>

   <div class="row table mt-5">
      <table class="invoice table table-hover">
         <thead class="thead">
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Item</th>
               <th scope="col">Qty.</th>
               <th scope="col">Price</th>
               <th scope="col">Amount</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td class="item">Pembayaran {{ $history->tagihan->name }}</td>
               <td>1</td>
               <td>Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}</td>
               <td>Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}</td>
            </tr>
         </tbody>
      </table>
   </div>

   <div class="row">
      <!-- invoiced to details -->
      <div class=" offset-2 col-4">
         <div class="to text-right">
            <h5 class="effect-color pt-4">Invoiced to:</h5>
            <h4 class="theme-color"><strong>{{ $history->users->mhs_name }}</strong></h4>
            <h6>{{ $history->users->mhs_addr_kota == null ? 'Nama Kota' : $history->users->mhs_addr_kota }}, {{ $history->users->mhs_addr_provinsi == null ? 'Nama Provinsi' : $history->users->mhs_addr_provinsi }}</h6>
            <p>Contact details Spanning on multiple rows cuz bootstrap is awesome.</p>
         </div>
      </div>
      <!-- Invoice assets and total -->
      <div class="col-6 pr-5">
         <table class="table table-borderless text-right">
            <tbody>
               <tr>
                  <th scope="row">Subtotal</th>
                  <td>Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}</td>
               </tr>
               <tr class="last-row">
                  <th scope="row">
                     <h4>Total</h4>
                  </th>
                  <td>
                     <h4>Rp. {{ number_format($history->tagihan->price, 0, ',', '.') }}</h4>
                  </td>
               </tr>
            </tbody>
         </table>
         <h5>Due date: <span style="color: red">{{ \Carbon\Carbon::parse($history->created_at)->addDays(3)->format('d M Y H:i:s') }}</span></h5>

      </div>
   </div>
   <p class="text-center mt-3"><em>* Taxes will be calculated in &euro; using the default % value for your region</em></p>
</div>


</body>

</html>
