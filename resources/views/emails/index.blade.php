<!-- {{$data['introMessage']}}<br><br> -->

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <title>The Dugout Voucher</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
  <style type="text/css">
    html{width: 100%;margin-left: auto;margin-right: auto; background:#fff; font-family: "Open Sans", sans-serif;}
    h1 { font-family: "Open Sans", sans-serif; color: #212121; font-size: 1.3em; margin: 0; font-weight: 800; }
    h2 {font-family: "Open Sans", sans-serif; color: #616161; font-size: 1em; font-weight: 500;}
    h3 { font-family: "Open Sans", sans-serif; color: #212121; font-size: 1.1em; margin-bottom: 1em; font-weight: 800; }
    span { color: #FBB03B; font-weight: 700; font-family: "Open Sans", sans-serif;}
  </style> 
</head>
<body style='width: 100%;margin-left: auto;margin-right: auto; position:absolute;'>
<table  class="centerTable" align='center' cellpadding='0' cellspacing='0' width='800' style='border-collapse: collapse;'>
    <tr>
      <td align='center' bgcolor='#212121' style='padding: 2% 3%;'>
          <img  src='{{url("web/img/dugout-logo.png")}}'  style='display: block; width: 200px;' alt='dugout'>
      </td>
    </tr>
 
    <tr>
        <td align='center' bgcolor='#fff' style='padding: 40px 40px 10px ;'>
          <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td width="260" valign="top" align="center">
                <h1>{{$data['heading']}}</h1>
              </td>  
            </tr> 
          </table> 
        </td>
    </tr>

    <tr>
        <td align='center' bgcolor='#fff' style='padding: 0px 40px 10px ;'>
          <h2>{{$data['introMessage']}}</h2>
        </td>
    </tr> 

    <tr>
        <td align='center' bgcolor='#fff' style='padding: 0px 40px 10px ;'>
         <hr style="width: 25%; color: #cacaca;">
        </td>
    </tr>   

     <tr>
      <td align='left' bgcolor='#fff' style='padding:20px 30px ;background-color: #f0f1f2;'>
        <table cellpadding='0' cellspacing='0' width='100%'>
          <tr>
            <td valign='top' align='left' >
              <table cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <h3>Reservation Details</h3>
                  </td>  
                </tr>

                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <span style='color: #424242; font-weight: 400; font-size: 1em;'>Name: {{$data['name']}}</span> <br><br>
                  </td>  
                </tr>

                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <span style='color: #424242; font-weight: 400; font-size: 1em;'>Email: {{$data['email']}}</span> <br><br>
                  </td>  
                </tr>

                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <span style='color: #424242; font-weight: 400; font-size: 1em;'>Phone Number: {{$data['phone']}}</span> <br><br>
                  </td>  
                </tr>

                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <span style='color: #424242; font-weight: 400; font-size: 1em;'>Date: {{$data['date']}}</span> <br><br>
                  </td>  
                </tr>

                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <span style='color: #424242; font-weight: 400; font-size: 1em;'>Time: {{$data['time']}}</span> <br><br>
                  </td>  
                </tr>

                <tr>
                  <td valign='top' align='left' style="line-height: 1;">
                    <span style='color: #424242; font-weight: 400; font-size: 1em;'>No. of Pax: {{$data['people']}}</span> <br><br>
                  </td>  
                </tr> 
              </table> 
            </td>   
          </tr>
        </table>
      </td>
    </tr>
    
    <tr>
        <td align='center' bgcolor='#fff' style='padding: 0px 40px 30px ;'>
         <hr style="width: 25%; color: #fff; border: transparent;">
        </td>
    </tr>  

    <tr> 
      <td align="left" bgcolor="#212121" style="padding: 5px;">
        <p style=" color: #fff; text-align: center; font-size: .9em; padding: .2em 0;">
          All Rights Reserved &copy; The Dugout 2018 <br> 
          Email: <span ><a href="mailto:bartender@thedugoutoasis.com" style="color: #c8a766">bartender@thedugoutoasis.com</a> </span> | Tel: <span><a href="tel:0378320668"  style="color: #c8a766"> 0378320668</a></span>  
          </p>
      </td> 
    </tr>   

  </table>
</body>
</html>


<!-- <table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Time</th>
            <th>Number of People</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$data['name']}}</td>
            <td>{{$data['email']}}</td>
            <td>{{$data['phone']}}</td>
            <td>{{$data['date']}}</td>
            <td>{{$data['time']}}</td>
            <td>{{$data['people']}}</td>
        </tr>
    </tbody>
</table>

<br><br>
<br>

<br><br>
Thanks,<br>
The Dugout Oasis -->