<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale = 1.0, maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title> Digital Utility Meter| Usage</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/email.css">
  </head>
  <body>
    <header>
      
      <div class="container">
               
        <div id="branding">
          <h1><span class="highlight">Digital</span> Utility Meter</h1> 
        </div>
        
        <nav>
          <ul>
            <li class="current"><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <!-- TODO: Style the Logout button accordingly -->
            <li><form action="/logout" method="POST"><button type="submit" class="btn btn-link">Logout</button></form></li>        
          </ul>
        </nav>
      </div>
    </header>
     <section id="showcase">
      <div class="container">
        <h1>Welcome! Digital Utility Meter</h1>
        <p style="color:rgb(197, 32, 7);text-align: center;font-size: 20px;"> <b>&rarr; Check your Gas_Usage<br>&rarr; Check Your electricity_Usage<BR> &rarr; Check Water_Usage</p>
        </b>
      </div>
    </section>
 <form action="#box" role="form" onsubmit="return false" class="form" oninput="bill.value=(curr.value-prev.value)*ppk.value+800">
  <fieldset style="width:500px">
         <legend><h1>Electricity Usage!</h1></legend>
          <label for="curr">Current Reading
          <input class="form-control inp" name="curr" type="number" value="" placeholder="Units in kWh"></label> 

          <label for="prev">Previous Reading 
          <input class="form-control inp" name="prev" type="" value="" placeholder="Units in kWh"></label>

          <label for="startDate">Start Date
          <input class="form-control inp" name="startDate" type="date"></label>
          <label for="endDate">End Date
          <input class="form-control inp" name="endDate" type="date"></label>
        
          <label for="sancLoad">Sanctioned Load
          <select class="form-control inp" name="sancLoad">
            <option>2 kW</option>
            <option>>2-5 kW</option>
          </select></label>
        <label for="curr">Current Price Per KWh
          <input class="form-control inp" name="ppk" type="number" value="" placeholder="Current Price Per KWh"></label>
       <h2>Bill</h2> :<output name="bill"id="bill" for="Electricity_Usage"></output>
        </form>
  
      </fieldset>
  <form action="#box" role="form" onsubmit="return false" class="form" oninput="bill.value=(curr.value-prev.value)*ppk.value+300">
  
  <fieldset style="width:500px">
         <legend><h1>Water Usage!</h1></legend>
          <label for="curr">Current Reading Units in m<sup>3</sup>:
          <input class="form-control inp" name="curr" type="number" value="" placeholder="Units in kWh"></label> 

          <label for="prev">Previous Reading Units in m<sup>3</sup>:
          <input class="form-control inp" name="prev" type="" value="" placeholder="Units in kWh"></label>

          <label for="startDate">Start Date
          <input class="form-control inp" name="startDate" type="date"></label>
          <label for="endDate">End Date
          <input class="form-control inp" name="endDate" type="date"></label>
        
          <label for="sancLoad">  Water Meter Size
          <select class="form-control inp" name="sancLoad">
            <option>2 inches</option>
            <option>>2-5 inches</option>
          </select></label>
        <label for="curr">Current Price Per KWh
          <input class="form-control inp" name="ppk" type="number" value="" placeholder="Current Price Per KWh"></label>
         <h2> Bill </h2> :<output name="bill"id="bill" for="Water_Usage"></output>

  </fieldset>
   <form  role="form" name="elecForm" onsubmit="return false" class="form" oninput="bill.value=(curr.value-prev.value)*(ppk.value+sch.value)">
  <fieldset style="width:500px">
         <legend><h1>Gas Usage!</h1></legend>
          <label for="curr">Current Meter Reading
          <input class="form-control inp" name="curr" type="number" value="" placeholder="Units"></label> 

          <label for="prev">Previous Meter Reading 
          <input class="form-control inp" name="prev" type="" value="" placeholder="Units "></label>

          <label for="startDate">Start Date
          <input class="form-control inp" name="startDate" type="date"></label>
          <label for="endDate">End Date
          <input class="form-control inp" name="endDate" type="date"></label>
        
          <label for="sancLoad">Meter Type
          <select class="form-control inp" name="meter type">
            <option>imperial ft3</option>
            <option>metric M3</option>

          </select></label>
          <label for="curr">Current Price Per KWh
          <input class="form-control inp" name="ppk" type="number" value="" placeholder="Current Price Per KWh"></label>
          <label for="curr">standing charge
          <input class="form-control inp" name="sch" type="number" value="" placeholder="standing charge"></label>
        
          <h2>Bill</h2> :<output name="bill"id="bill" for="Gas_Usage"></output>
  </fieldset>
  </body>
</html>
