<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice->invoice_id }}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: small;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
            padding:0 10px 0 10px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding:10px;
            font-size: x-small;
        }
        .invoice{
            border:1px solid #60A7A6;    
        }
        .invoice p{
            font-size:small;
        }
        .main{
            width:960px;
            margin: 0 auto;
        }
        table{
            border-collapse:collapse;
        }
    </style>

</head>
<body>
<div class="main">
    <div style="padding-top:3px;padding-left:1px;float:right;padding-right:5px;"><a href="javascript:;" onClick="window.close();return false;" class="MainLink">Close</a></div>
	<div style="height:20px;width:21px;float:right;padding-left:10px;"><a href="javascript:;" onClick="window.close();return false;" class="MainLink"><img alt="" src="images/close_ico.gif" border=0></a></div>

    <div style="padding-top:3px;padding-left:3px;float:right;"><a href="{{ route('invoicePdf',['download'=>'pdf','iid'=>$invoice->id]) }}" class="MainLink">Save as PDF</a></div>
    <div style="height:20px;width:21px;float:right;"><a href="js_cv_preview.php?cv_sid=1366801&pdf=" class="MainLink"><img alt="" src="images/file_type/22/pdf.gif" width="20" border=0></a></div>
    
    <div class="information">
            
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                
                    <p><strong>Primaoc / Issued to : </strong><span> {{ $invoice->first_name }} {{ $invoice->last_name }}</span></p>

                    <p><strong>Ime kompanije / Company name : </strong><span> {{ $company->company_name }}</span></p>

            
                    <p><strong>Adresa / Address : </strong><span> {{ $company->company_address }} , {{ $company->country }} , {{ $company->company_registered_office }}</span></p>
                
                    <p><strong>PIB / Tax ID : </strong><span> {{ $company->pib }}</span></p>
                    @if($company->vat)
                        <p><strong>PDV broj / VAT number : </strong><span> {{ $company->vat }}</span></p>
                    @endif
                
                </td>
                <td align="center">
                    <img src="{{ URL::to('/public')}}/photos/naposaologo.png" alt="Logo" width="150" class="logo"/>
                </td>
                <td align="right" style="width: 40%;">
                    <p><strong>Izdavalac / Issued by : </strong><span> {{ $info->name }}</span></p>

                    <p><strong>Adresa / Address : </strong><span> {{ $info->address }} , {{ $info->country }} , {{ $info->city }}</span></p>

                    <p><strong>PIB / Tax ID : </strong><span> {{ $info->pib }}</span></p>

                    <p><strong>PDV broj / VAT number : </strong><span> {{ $info->vat }}</span></p>
                    <br><br>

                    <p><strong>Banka / Bank : </strong><span> {{ $info->bank_name }} ,</span></p>
                    <p>{{ $info->bank_address }} , {{ $info->bank_country }} , {{ $info->bank_city }}</p>

                    <p><strong>BIC : </strong><span> {{ $info->bic }}</span></p>

                    <p><strong>IBAN : </strong><span> {{ $info->iban }}</span></p>
                </td>
            </tr>

        </table>
    </div>

    <br/>

    <div class="invoice">
    
    <table style="width:100%;">
        <thead>
            <tr>
                <th align="left" style="padding:10px 0 0 0;">Original / Original</th>
                <th align="left" colspan="4" style="padding:10px 0 0 0;">Faktura / Invoice</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td></td>
                <td align="left" colspan="3">Broj / Number : {{ $invoice->invoice_id }}</td>
            </tr>
            <tr>
                <td></td>
                <td align="left" colspan="3">Datum / Date : {{ $invoice->created_at->toFormattedDateString() }}</td>
            </tr>
            <tr>
                <td style="padding:0 0 10px 0;"></td>
                <td align="left" colspan="3" style="padding:0 0 10px 0;">Mesto dogovora / Place : {{ $invoice->city }} , {{ $invoice->state }}</td>
            </tr>
            
            <tr>
                <td colspan="5" align="right" style="border-top:1px solid #60A7A6;border-bottom:1px solid #60A7A6;padding:10px 0 10px 0;">Iznos(DIN) / Amount(RSD)</td>
            </tr>
            
            <tr>
                <td colspan="4" align="left" style="padding:10px 0 0 0;">Paket {{ $invoice->package }} kredita</td>
                <td align="right" style="padding:10px 0 0 0;border-left:1px solid #60A7A6;">{{ $invoice->amount }}</td>
            </tr>
            <tr>
                <td colspan="4" align="left" style="border-bottom:1px solid #60A7A6;padding:0 0 10px 0;">Package {{ $invoice->package }} credits</td>
                <td style="border-left:1px solid #60A7A6;border-bottom:1px solid #60A7A6;"></td>   
            </tr>
            <tr>
                <td colspan="4" align="right" style="padding:10px 0 0 0;">Suma neto / Net amount :</td>
                <td align="right" style="padding:10px 0 0 0;">{{ $invoice->amount }}</td>
            </tr>
            <tr>
                <td colspan="4" align="right" style="padding:10px 0 10px 0;">PDV / VAT (20%):</td>
                <td align="right" style="padding:10px 0 10px 0;">{{ $invoice->tax }}</td>
            </tr>
            <tr>
                <td colspan="4" align="right" style="padding:10px 0 10px 0;"><strong>Suma za placanje / Invoice total:</strong></td>
                <td align="right" style="padding:10px 0 10px 0;border-top:2px solid #60A7A6"><strong>{{ $invoice->amount + $invoice->tax }}</strong></td>
            </tr>
        </tbody>

    </table>

    </div>
    <div class="information" style="bottom: 0;width:100%;height:20px;">
    </div>
</div>
</body>
</html>
