<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>invoice view</title>

	<style type="text/css">
		.clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #5D6975;
        text-decoration: underline;
        }

        body {
        position: relative;
        width: 600px;

        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
        }

        header {
        padding: 10px 0;
        margin-bottom: 30px;
        }

        #logo {
        text-align: center;
        margin-bottom: 10px;
        }

        #logo img {
        width: 90px;
        }

        h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
        }

        #project {
        float: left;
        }

        #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
        }

        #company {
        float: right;
        text-align: right;
        }

        #project div,
        #company div {
        white-space: nowrap;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
        background: #F5F5F5;
        }

        table th,
        table td {
        text-align: center;
        }

        table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
        }

        table .service,
        table .desc {
        text-align: left;
        }

        table td {
        padding: 20px;
        text-align: right;
        }

        table td.service,
        table td.desc {
        vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
        font-size: 1.2em;
        }

        table td.grand {
        border-top: 1px solid #5D6975;;
        }

        #notices .notice {
        color: #5D6975;
        font-size: 1.2em;

        }

        footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
        }
	</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        {{-- <img src="logo.png"> --}}
      </div>
      <h1>INVOICE NO: {{$order->id}}</h1>
      <div id="company" class="clearfix ">
          <h4>Customer info</h4>
        <div>{{$customer->first_name.' '.$customer->last_name}}</div>
        <div>Total: ${{$order->total_price}},<br /></div>
        <div>{{$customer->address}},<br /></div>
        <div>{{$customer->phone_number}}</div>
        <div><a href="mailto:company@example.com">{{$customer->email_address}}</a></div>

      </div>
      <div id="project">
            <h4>Shipping info</h4>
        <div><span>Name</span> {{$shipping->full_name}}</div>
        <div><span>Phone </span> {{$shipping->phone_number}}</div>
        <div><span>ADDRESS</span> {{$shipping->address}}</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">{{$shipping->email_address}}</a></div>
        <div><span>DATE</span> {{$shipping->created_at}}</div>

      </div>
    </header>
    <main>
      <table width="100%" style="width:100%">
        <thead>
          <tr>
            <th>SN</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>price</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody >
            @foreach ($order_details as $order_detail)
                <tr>
                    <td style="width:5%">{{$loop->index+1}}</td>
                    <td style="text-align:center">{{$order_detail->product_name}}</td>
                    <td style="width:80px">
                        <img style="width:50%" src="{{asset('uploads/product_images')}}/{{$order_detail->product_image}}" class="w-50" alt="">
                    </td>
                    <td>{{$order_detail->product_price}}</td>
                    <td class="qty">{{$order_detail->product_quantity}}</td>
                    <td class="total">{{$order_detail->product_quantity*$order_detail->product_price}}</td>
                  </tr>
            @endforeach
          <tr>
            <td colspan="5">SUBTOTAL</td>
            <td class="total">$ {{$order->total_price}}</td>
          </tr>
          <tr>
            <td colspan="5">TAX 0%</td>
            <td class="total">${{$order->total_price}}</td>
          </tr>
          <tr>
            <td colspan="5" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$ {{$order->total_price}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
