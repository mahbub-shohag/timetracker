<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoice</title>
</head>
<body>
<style>
    body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
    }

    body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
    }

    body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
    }

    body a {
        color: #06f;
    }

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 14px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 1px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 25px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;

        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 0px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {

        font-weight: bold;
    }
    .invoice-box table tr.total td:nth-child(2),
    .invoice-box table tr.total td:nth-child(3),
    .invoice-box table tr.total td:nth-child(4) {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="invoice-box">

                    <table>
                        <tr class="top">
                            <td colspan="6">
                                <table>
                                    <tr>
                                        <td class="title">
                                            <h2>Verdant</h2>
                                            <p style="font-size: 20px;">+121212123 </br> verdant@info.com</p>
                                        </td>
                                        <td>
                                            Invoice<br />
                                            INV0001<br /><br />
                                            DATE<br />
                                            {{date('Y-m-d')}}<br /><br />
                                            DUE<br />
                                            On Receipt<br /><br />
                                            BALANCE DUE<br />
                                            USD {{round($rate*$total_working_hour, 2)}}<br />
                                            <hr>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>


                        <tr class="information">
                            <td colspan="6">
                                <table>
                                    <tr>
                                        <td>
                                            <h4>Bill To</h4>
                                            {{$dss[0]->location->name}}<br />
                                            client@gmail.com<br />
                                            96045678<br />
                                            {{$dss[0]->location->location}}
                                        </td>

                                        <td>
                                            MONTH<br />
                                            November<br /><br />
                                            SERVICE</br >
                                            Snow Removal
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                            </td>
                        </tr>

                        <tr class="#">
                            <th class="bold">DATE</th>
                            <th style="text-align: center">Time In/Out</th>
                            <th style="text-align: center">PLOW </br>PARKING LOT</th>
                            <th style="text-align: center">DIE-ICE </br>PARKING LOT</th>
                            <th style="text-align: right">SHOVEL </br>WALKWAYS</th>
                            <th style="text-align: right">DE-ICE </br>WALKWAYS</th>
                        </tr>


                        @foreach($dss as $ds)
                            <tr class="item">
                                <td>{{ \Carbon\Carbon::parse($ds['created_at'])->format('M d, Y')}}</td>
                                <td style="text-align: center">{{ \Carbon\Carbon::parse($ds['clockIn'])->format('H:i A')}}/{{ \Carbon\Carbon::parse($ds['clockOut'])->format('H:i A')}}</td>
                                <td style="text-align: center"><?php if($ds->lots->plow) echo "Plow"; ?></td>
                                <td style="text-align: center"><?php if($ds->lots->salt) echo "Salt"; ?></td>
                                <td style="text-align: right"><?php if($ds->cityWalk->shovel || $ds->internalWalk->shovel) echo "Shovel"; ?></td>
                                <td style="text-align: right"><?php if($ds->cityWalk->melter || $ds->internalWalk->melter) echo "Melter"; ?></td>
                            </tr>
                        @endforeach

                        <tr class="total">
                            <td colspan="3"></td>
                            <th style="text-align: center">Total Working Hours</th>
                            <th style="text-align: center">Rate</th>
                            <th style="text-align: center">Amount</th>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td style="text-align: center">{{round($total_working_hour,2)}} h</td>
                            <td style="text-align: center">{{$rate}}</td>
                            <td>{{round($rate*$total_working_hour,2)}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td style="text-align: center">Subtotal: </td>
                            <td></td>
                            <td style="text-align: center">{{round($rate*$total_working_hour,2)}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td style="text-align: center">Tax: </td>
                            <td></td>
                            <td style="text-align: center">0</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td style="text-align: center">Total: </td>
                            <td></td>
                            <td style="text-align: center">{{round($rate*$total_working_hour,2)}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td style="text-align: center">Balance DUE: </td>
                            <td></td>
                            <td style="text-align: center">USD {{round($rate*$total_working_hour,2)}}</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
