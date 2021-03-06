<?php 
$c = \Bageur\Company\Model\company::first();
$satu = \Bageur\Artikel\model\artikel::inRandomOrder()->where('id','!=',$data->id)->first();  
$dua  = \Bageur\Artikel\model\artikel::inRandomOrder()->whereNotIn('id',[$data->id,$satu->id])->first();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<title>{{$data->judul}}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0 " />
<meta name="format-detection" content="telephone=no"/>
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,700,700i,900,900i" rel="stylesheet" />
<!--<![endif]-->
<style type="text/css">
body {
  margin: 0;
  padding: 0;
  -webkit-text-size-adjust: 100% !important;
  -ms-text-size-adjust: 100% !important;
  -webkit-font-smoothing: antialiased !important;
}
img {
  border: 0 !important;
  outline: none !important;
}
p {
  Margin: 0px !important;
  Padding: 0px !important;
}
table {
  border-collapse: collapse;
  mso-table-lspace: 0px;
  mso-table-rspace: 0px;
}
td, a, span {
  border-collapse: collapse;
  mso-line-height-rule: exactly;
}
</style>
</head>
<body class="em_body" style="margin:0px auto; padding:0px;" bgcolor="#efefef">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center"  bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="{{$c->avatar}}" width="208" alt="meowgun" border="0" style="display:block; font-family:Arial, sans-serif; font-size:18px; line-height:25px; text-align:center; color:#1d4685; font-weight:bold; max-width:208px;" class="em_w150" /></a></td>
              </tr>
              <tr>
                <td height="28" style="height:28px;" class="em_h20">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center" bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed; background-color:#f8f8f8;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px; background-color:#efefef;" bgcolor="#efefef" class="em_aside10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr>
                <td class="em_blue em_font_22" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 26px; line-height: 29px; color:#264780; font-weight:bold;">INFO MIDIATAMA</td>
              </tr>
              <tr>
                <td height="22" class="em_h20" style="height:22px; font-size:0px; line-height:0px;">&nbsp;</td>
              </tr>
              <tr>
              	<td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="{{$data->avatar}}" width="600" class="em_full_img" alt="Alt tag goes here" border="0" style="display:block; max-width:600px; font-family:Arial, sans-serif; font-size:17px; line-height:20px; color:#000000; font-weight:bold;" /></a></td>
              </tr>
              <tr>
              	<td valign="top" align="left" bgcolor="#ffffff" style="padding-left:25px; padding-right:35px; background-color:#ffffff;" class="em_aside10">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                      <tr>
                        <td height="22" style="height:22px;" class="em_h20">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="em_blue em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 20px; line-height: 24px; color:#264780; font-weight:bold;">{{$data->judul}}</td>
                      </tr>
                      <tr>
                        <td height="8" style="height:8px; font-size:0px; line-height:0px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="em_grey em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color:#434343;">{{Str::limit(\Bageur::toText($data->text),350)}}</td>
                      </tr>
                      <tr>
                        <td height="16" style="height:16px; font-size:1px; line-height:1px;">&nbsp;</td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">
                        <table width="140" border="0" cellspacing="0" cellpadding="0" align="left" style="width:140px;" class="em_wrapper">
                          <tr>
                            <td valign="top" align="center">
                            	<table width="140" style="width:140px; background-color:#6bafb2; border-radius:4px;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#6bafb2">
                          <tr>
                            <td class="em_white" height="34" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; color:#ffffff; font-weight:bold; height:34px;"><a href="{{config('bageur.auth.artikel_url')}}{{$data->judul_seo}}" target="_blank" style="text-decoration:none; color:#ffffff; line-height:34px; display:block;">Baca Lebih Lengkap</a></td>
                          </tr>
                        </table>
                            </td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      <tr>
                        <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
                      </tr>
                    </table>
                </td>
              </tr>

            </table>
            </td>
          </tr>
          <tr>
          	<td height="20" class="em_h10" bgcolor="#efefef" style="height:20px; font-size:1px; line-height:1px; background-color:#efefef;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" bgcolor="#efefef" style="padding:0 25px; background-color:#efefef;" class="em_aside10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr>
              	<td valign="top" align="center">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td valign="top">
                        	<table width="290" border="0" cellspacing="0" cellpadding="0" align="left" style="width:290px; background-color:#ffffff;" bgcolor="#ffffff" class="em_wrapper">
                              <tr>
                                <td valign="top" align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="{{$satu->avatar}}" width="290"  class="em_full_img2" alt="Alt tag goes here" border="0" style="display:block; max-width:290px; font-family:Arial, sans-serif; font-size:17px; line-height:20px; color:#000000; font-weight:bold;" /></a></td>
                              </tr>
                              <tr>
                                <td valign="top" align="left" bgcolor="#ffffff" style="padding-left:25px; padding-right:30px; background-color:#ffffff;" class="em_aside10">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                      <tr>
                                        <td height="22" style="height:22px;" class="em_h20">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="em_blue em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 20px; line-height: 24px; color:#264780; font-weight:bold;">{{$satu->judul}}</td>
                                      </tr>
                                      <tr>
                                        <td height="10" style="height:10px; font-size:0px; line-height:0px;">&nbsp;</td>
                                      </tr>
                                      <tr>
                                      	<td valign="top" align="left" height="155" style="height:155px;" class="em_hauto">
                                        	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                              <tr>
                                                <td class="em_grey em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color:#434343;">{{Str::limit(\Bageur::toText($satu->text),150)}}</td>
                                              </tr>
                                              <tr>
                                                <td height="10" class="em_h15" style="height:10px; font-size:1px; line-height:1px;">&nbsp;</td>
                                              </tr>
                                            </table>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td align="left" valign="top">
                                        <table width="140" border="0" cellspacing="0" cellpadding="0" align="left" style="width:140px;" class="em_wrapper">
                                          <tr>
                                            <td valign="top" align="center">
                                            	<table width="140" style="width:140px; background-color:#6bafb2; border-radius:4px;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#6bafb2">
                                          <tr>
                                            <td class="em_white" height="34" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; color:#ffffff; font-weight:bold; height:34px;"><a href="https://www.mailgun.com" target="_blank" style="text-decoration:none; color:#ffffff; line-height:34px; display:block;">READ MORE</a></td>
                                          </tr>
                                        </table>
                                            </td>
                                          </tr>
                                        </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>
                            </table>

                            <table width="290" border="0" cellspacing="0" cellpadding="0" align="right" style="width:290px; background-color:#ffffff;" bgcolor="#ffffff" class="em_wrapper">
                              <tr>
                                <td valign="top" align="center" class="em_border"><a href="#" target="_blank" style="text-decoration:none;"><img src="{{$dua->avatar}}" width="290"  class="em_full_img2" alt="Alt tag goes here" border="0" style="display:block; max-width:290px; font-family:Arial, sans-serif; font-size:17px; line-height:20px; color:#000000; font-weight:bold;" /></a></td>
                              </tr>
                              <tr>
                                <td valign="top" align="left" bgcolor="#ffffff" style="padding-left:25px; padding-right:30px; background-color:#ffffff;" class="em_aside10">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                      <tr>
                                        <td height="22" style="height:22px;" class="em_h20">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td class="em_blue em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 20px; line-height: 24px; color:#264780; font-weight:bold;">{{$dua->judul}}</td>
                                      </tr>
                                      <tr>
                                        <td height="10" style="height:10px; font-size:0px; line-height:0px;">&nbsp;</td>
                                      </tr>
                                      <tr>
                                      	<td valign="top" align="left" height="155" style="height:155px;" class="em_hauto">
                                        	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                              <tr>
                                                <td class="em_grey em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color:#434343;">{{Str::limit(\Bageur::toText($dua->text),150)}}</td>
                                              </tr>
                                              <tr>
                                                <td height="10" class="em_h15" style="height:10px; font-size:1px; line-height:1px;">&nbsp;</td>
                                              </tr>
                                            </table>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td align="left" valign="top">
                                        <table width="160" border="0" cellspacing="0" cellpadding="0" align="left" style="width:160px;" class="em_wrapper">
                                          <tr>
                                            <td valign="top" align="center">
                                            	<table width="160" style="width:160px; background-color:#6bafb2; border-radius:4px;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#6bafb2">
                                          <tr>
                                            <td class="em_white" height="34" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; color:#ffffff; font-weight:bold; height:34px;"><a href="https://www.mailgun.com" target="_blank" style="text-decoration:none; color:#ffffff; line-height:34px; display:block;">DOWNLOAD NOW</a></td>
                                          </tr>
                                        </table>
                                            </td>
                                          </tr>
                                        </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                    </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center" bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="40" style="height:40px;" class="em_h20">&nbsp;</td>
              </tr>
              {{-- <tr>
                <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td width="30" style="width:30px;" align="center" valign="middle"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/fb.png" width="30" height="30" alt="Fb" border="0" style="display:block; font-family:Arial, sans-serif; font-size:18px; line-height:25px; text-align:center; color:#000000; font-weight:bold; max-width:30px;" /></a></td>
                      <td width="12" style="width:12px;">&nbsp;</td>
                      <td width="30" style="width:30px;" align="center" valign="middle"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/tw.png" width="30" height="30" alt="Tw" border="0" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:25px; text-align:center; color:#000000; font-weight:bold; max-width:30px;" /></a></td>
                      <td width="12" style="width:12px;">&nbsp;</td>
                      <td width="30" style="width:30px;" align="center" valign="middle"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/insta.png" width="30" height="30" alt="Insta" border="0" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:25px; text-align:center; color:#000000; font-weight:bold; max-width:30px;" /></a></td>
                    </tr>
                  </table>
                 </td>
              </tr> --}}
              <tr>
                <td height="16" style="height:16px; font-size:1px; line-height:1px; height:16px;">&nbsp;</td>
              </tr>
              <tr>
                <td class="em_grey" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 15px; line-height: 18px; color:#434343; font-weight:bold;">Jika Ada Pertanyaan / Masalah pada email ini?</td>
              </tr>
              <tr>
                <td height="10" style="height:10px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top" style="font-size:0px; line-height:0px;"><table border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td width="15" align="left" valign="middle" style="font-size:0px; line-height:0px; width:15px;"><a href="mailto:meow@meowgun.com" style="text-decoration:none;"><img src="/assets/pilot/images/templates/email_img.png" width="15" height="12" alt="" border="0" style="display:block; max-width:15px;" /></a></td>
                    <td width="9" style="width:9px; font-size:0px; line-height:0px;" class="em_w5"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
                    <td class="em_grey em_font_11" align="left" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; line-height: 15px; color:#434343;"><a href="mailto:{{$c->email}}" style="text-decoration:none; color:#434343;">{{$c->email}}</a></td>
                  </tr>
                </table>
                </td>
              </tr>
               <tr>
                <td height="9" style="font-size:0px; line-height:0px; height:9px;" class="em_h10"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
              </tr>
              <tr>
                <td height="35" style="height:35px;" class="em_h20">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
           <tr>
            <td height="1" bgcolor="#dadada" style="font-size:0px; line-height:0px; height:1px;"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
          </tr>
           <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="16" style="font-size:0px; line-height:0px; height:16px;">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" align="left" class="em_wrapper">
                  <tr>
                    <td class="em_grey" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 11px; line-height: 16px; color:#434343;">{{$c->nama_perusahaan}} © {{date('Y')}}</td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td height="16" style="font-size:0px; line-height:0px; height:16px;">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td class="em_hide" style="line-height:1px;min-width:650px;background-color:#efefef;"><img alt="" src="/assets/pilot/images/templates/spacer.gif" height="1" width="650" style="max-height:1px; min-height:1px; display:block; width:650px; min-width:650px;" border="0" /></td>
          </tr>
        </table>
      </td>
    </tr>
</table>
</body>
</html>