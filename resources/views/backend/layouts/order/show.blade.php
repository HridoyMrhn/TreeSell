<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('backend/vendors/styles/invoice.css') }}">
</head>
<body>
    <div id="invoiceholder">
        <div id="invoice" class="effect2">
            <div id="invoice-top">
                <div class="logo"><img src="https://www.almonature.com/wp-content/uploads/2018/01/logo_footer_v2.png"
                        alt="Logo"></div>
                <div class="title">
                    <h1>Invoice #<span class="invoiceVal invoice_num">tst-inv-23</span></h1>
                    <p>Invoice Date: <span id="invoice_date">01 Feb 2018</span><br>
                        GL Date: <span id="gl_date">23 Feb 2018</span>
                    </p>
                </div>
                <!--End Title-->
            </div>
            <!--End InvoiceTop-->



            <div id="invoice-mid">
                <div id="message">
                    <h2>Hello Andrea De Asmundis,</h2>
                    <p>An invoice with invoice number #<span id="invoice_num">tst-inv-23</span>
                        is created for <span id="supplier_name">TESI S.P.A.</span> which is 100%
                        matched with PO and is waiting for your approval. <a
                            href="javascript:void(0);">Click here</a> to login to view the
                        invoice.</p>
                </div>
                <div class="cta-group mobile-btn-group">
                    <a href="javascript:void(0);" class="btn-primary">Approve</a>
                    <a href="javascript:void(0);" class="btn-default">Reject</a>
                </div>
                <div class="clearfix">
                    <div class="col-left">
                        <div class="clientlogo"><img
                                src="https://cdn3.iconfinder.com/data/icons/daily-sales/512/Sale-card-address-512.png"
                                alt="Sup" /></div>
                        <div class="clientinfo">
                            <h2 id="supplier">TESI S.P.A.</h2>
                            <p><span id="address">VIA SAVIGLIANO, 48</span><br><span
                                    id="city">RORETO DI CHERASCO</span><br><span
                                    id="country">IT</span> - <span
                                    id="zip">12062</span><br><span
                                    id="tax_num">555-555-5555</span><br></p>
                        </div>
                    </div>
                    <div class="col-right">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><span>Invoice Total</span><label
                                            id="invoice_total">61.2</label></td>
                                    <td><span>Currency</span><label id="currency">EUR</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Payment Term</span><label id="payment_term">60 gg
                                            DFFM</label></td>
                                    <td><span>Invoice Type</span><label id="invoice_type">EXP
                                            REP INV</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span>Note</span>#<label
                                            id="note">None</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Invoice Mid-->

            <div id="invoice-bot">
                <div id="table">
                    <table class="table-main border">
                        <thead>
                            <tr class="tabletitle">
                                <th>No</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($order_details->orderDetails as $data)
                            {{-- {{ $data->trees }} --}}
                                <tr class="list-item">
                                    <td class="tableitem">{{ $loop->index + 1 }}</td>
                                    <td class="tableitem">{{ $data->trees->tree_name }}</td>
                                    <td class="tableitem">{{ $data->product_quantity }}</td>
                                    <td class="tableitem">{{ $data->trees->tree_price }}</td>
                                    <td class="tableitem">{{ $data->product_quantity * $data->trees->tree_price }}</td>
                                    @php
                                        $subtotal += $data->product_quantity * $data->trees->tree_price
                                    @endphp
                                </tr>
                            @endforeach



                        <tr class="list-item total-row">
                            <tr>
                                <th colspan="3"></th>
                                <th class="tableitem">Subtotal</th>
                                <th class="tableitem">{{ $subtotal }}</th>
                            </tr>

                            <td colspan="5" data-label="Grand Total" class="tableitem">{{ $subtotal }}</td>
                        </tr>
                        <tr class="list-item total-row">
                            <th colspan="4">ef</th>
                            <th class="tableitem">Discount</th>
                            <td data-label="Grand Total" class="tableitem"></td>
                        </tr>
                        <tr class="list-item total-row">
                            <th colspan="4" class="tableitem">Grand Total</th>
                            <td colspan="4" data-label="Grand Total" class="tableitem"></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="cta-group">
                    <a href="javascript:void(0);" class="btn-primary">Approve</a>
                    <a href="javascript:void(0);" class="btn-default">Reject</a>
                </div>
            </div>

            <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="col-right">Our mailing address is:
                        <span class="email"><a href="mailto:supplier.portal@almonature.com">supplier.portal@almonature.com</a></span>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
