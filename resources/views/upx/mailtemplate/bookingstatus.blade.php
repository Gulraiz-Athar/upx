<html>

<body>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>

    <table width="614" border="0" align="center" cellpadding="0" cellspacing="0"
        style="font-family:'Open Sans',Arial,Helvetica,sans-serif;font-size:12px;color:#656565;background: #FDFDFD;border: 1px solid #D6D5D5;-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;-webkit-box-shadow: 0px -1px 5px #DDD;-moz-box-shadow: 0px -1px 3px #DDD;box-shadow: 0px -1px 5px #DDD;width: 168px;">

        <tbody>

            <tr>

                <td style="border-radius: 8px 8px 0 0; position: relative; text-align:center;">

                    <a href="{{ url('/login') }}" target="_blank">

                        <img src="{{ URL::asset('public/images/logo/logo.png') }}" alt="Orniverse" width="150"
                            border="0" style="padding:20px 20px 5px 20px; width:150px; height: auto;">

                    </a>

                </td>

            </tr>



            <tr>

                <td style="padding:0 18px 10px; background: #eee;">





                    <table width="576" border="0" cellspacing="0" cellpadding="0"
                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#656565">

                        <tbody>

                            <tr>

                                <td style="padding:0 10px 20px 10px;">

                                    <table width="554" border="0" align="center" cellpadding="0" cellspacing="0">

                                        <tbody>

                                            <tr>

                                                <td>
													<span style="font-size: 17px;"><br>Dear 
														@if ($data['usertype'] == 'sender')

														{{ $data['data']['addressessender']['name']??'' }}
														{{ $data['data']['addressessender']['lastname']??'' }}

														@endif

														@if ($data['usertype'] == 'receiver')

															{{ $data['data']['addressesreceiver']['name']??'' }}
															{{ $data['data']['addressesreceiver']['lastname']??'' }}

														@endif
													</span>
												<br>
												<br>
													<table width="554" border="0" align="center" cellpadding="0" cellspacing="0" style="border-spacing: 5px 5px;">
														<tbody>
														  <tr>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">From</td>
															<td colspan="2">{{ $data['data']['addressessender']['city'] ?? '-'}}</td>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">To</td>
															<td colspan="2">{{ $data['data']['addressesreceiver']['city'] ?? '-'}}</td>
														  </tr>
														  <tr>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Drop-in Date</td>
															<td colspan="2">{{ date('d M Y H:i A', strtotime($data['data']['created_at'])) }}</td>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Commodity</td>
															<td colspan="2">{{ $data['data']['booking_instruction']?? '-' }}</td>
														  </tr>
														  <tr>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Service</td>
															<td colspan="2">{{ $data['data']['service']['name']?? '-' }}</td>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Tracking No</td>
															<td colspan="2">{{ $data['data']['tracking_number'] ?? '-' }}</td>
														  </tr>
													   
														</tbody>
													  </table>
													  <br>
													<table width="554" border="0" align="center" cellpadding="0" cellspacing="0" style="border-spacing: 5px 5px;">
														<tbody>
														  <tr>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Total Pcs</td>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Actual Weight</td>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Volumetric Weight</td>
															<td colspan="2" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Chargeable Weight</td>
														  </tr>
														  <tr>
															<td colspan="2"  style="padding: 5;">1</td>
															<td colspan="2"  style="padding: 5;">{{ $data['data']['actual_weight'] ?? '-' }}</td>
															<td colspan="2"  style="padding: 5;">{{ $data['data']['volumetric_weight'] ?? '-' }}</td>
															<td colspan="2"  style="padding: 5;">0.5</td>
														  </tr>
														 
													   
														</tbody>
													  </table>
													  <br>
													<table width="554" border="0" align="center" cellpadding="0" cellspacing="0" style="border-spacing: 5px 0px;">
														<tbody>
															<tr>
															<td colspan="4" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Consignor Address</td>
															<td colspan="4" bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Consignee Address</td>
															</tr>

															<tr>
															<td colspan="4" style="padding: 5;">
																{{ $data['data']['addressessender']['address1'] ?? ''}} {{ $data['data']['addressessender']['address2'] ?? '' }} {{ $data['data']['addressessender']['address3'] ?? ''}}
															</td>
															<td colspan="4" style="padding: 5;">
																{{ $data['data']['addressesreceiver']['address1'] ?? ''}} {{ $data['data']['addressesreceiver']['address2'] ?? ''}} {{ $data['data']['addressesreceiver']['address3'] ?? ''}}
															</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table width="554" border="0" align="center" cellpadding="0" cellspacing="0" style="border-spacing: 5px 5px;">
														<tbody>
														  <tr>
															<td bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Sub Total</td>
															<td colspan="7" style="padding: 5;">£ {{ $data['data']['final_upx_price'] ?? '-' }}</td>
														   
														  </tr>
														  <tr>
															<td bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">Discount</td>
															<td colspan="7" style="padding: 5;">£ {{ $data['data']['discount_amt'] ?? '-' }}</td>
														  </tr>
														  <tr>
															<td bgcolor="#7d7d7d" style="font-size: large; padding: 5; font-weight: bold;">TOTAL</td>
															<td colspan="7" style="padding: 5;">£ {{ $data['data']['final_total_upx'] ?? '-' }}</td>
														  </tr>
														 
													   
														</tbody>
													</table>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </td>

                            </tr>

                        </tbody>

                    </table>
                    <table width="576" border="0" cellspacing="0" cellpadding="0"
                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#6c6c6c;padding:10px">
                        <tbody>
                            <tr>
                                <td>

                                    <div
                                        style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size: 14px; color: #6c6c6c;">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="576" border="0" cellspacing="0" cellpadding="0"
                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#6c6c6c">
                        <tbody>
                            <tr>

                                <td style="padding:0 10px 20px 10px;">

                                    <table width="554" border="0" align="center" cellpadding="0" cellspacing="0">

                                        <tbody>

                                            <tr>

                                                <td>

                                                    <div
                                                        style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size: 14px; color: #6C6C6C;">

                                                        <?php
                                                        //echo $html;
                                                        ?>

                                                    </div>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <td
                                    style="font-family:'Open Sans',Arial,Helvetica,sans-serif;font-size:14px;padding:10px;border-top:1px solid #6c6c6c;">

                                    Regards,<br /> United Parcel Xpress.

                                </td>

                            </tr>

                        </tbody>

                    </table>
                </td>
            </tr>
            <tr>
                <td
                    style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size:11px; line-height:16px; padding:15px 18px; text-align:center; border-radius: 0 0 8px 8px; background-color: #035293; border-top: 3px solid #e30512; color: #fff;">

                    Copyright unitedparcelxpress.com

                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
