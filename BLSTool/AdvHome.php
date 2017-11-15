<html lang="en">
<link type="text/css">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="AdvHome.js"></script>
    <title>Advanced Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="AdvHome.css">
</head>
<body>

<p id="spacer"></p>
<div id="VBar">Variables
    <a class="btn btn-primary" onclick="displayURL()" id="Analyze">
        Analyze!
    </a></div>
<h1 class = "pagename">Advanced Search</h1>
<div class="container">
    <h4 class="header">Economic Data</h4>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            Consumer Prices
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'CUUR0000SA0')">
                    Consumer Price Index (Urban Consumers)</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'CWUR0000SA0')">
                    Consumer Price Index (Wage Earners)</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'SUUR0000SA0')">
                    Chained Consumer Price Index</a></li>
            <!--<li><a href="#" onclick="AddButtonText(this.innerHTML, )">
                    Find Individual Goods Prices</a></li>-->
        </ul></div>

    <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            Producer Prices
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'PCUOMFG--OMFG--')">
                    Producer Price Index</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'WPUFD4')">
                    Total Demand</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'EIUIR')">
                    Import Prices</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'EIUIQ')">
                    Export Prices</a></li>
        </ul></div>

    <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            Employment and Unemployment
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'CES0000000001')">
                    National Employment (nonfarm, in thousands)</a></li>
            <!--<li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    State and Metro Employment</a></li>-->
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'LNS11000000')">
                    Civilian Labor Force Level (in 1000s)</li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'LNS11300000')">
                    Civilian Labor Participation Rate</li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'JTS00000000HIR')">
                    Hiring Rates</li>
            <!--<li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Local Employment</li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Employment Changes</li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Time Use</li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Marital and Family Labor Statistics</li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Employment Projections</li>-->
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'LNS13000000')">
                    Labor Force Unemployment Level (in thousands)</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'LNS14000000')">
                    Local Unemployment Rate</a></li>
        </ul></div>

    <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            Pay and Benefits
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'CIU1010000000000A')">
                    Civilian Worker Compensation (% change over last 12 months)</a></li>
            <!--<li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Employer Cost for Employee Compensation</a></li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Employee Benefits</a></li>-->
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'WSU001')">
                    Work Stoppages (days of idleness caused by)</li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'LEU0252881500')">
                    Median Weekly Earnings</a></li>
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'CES0000000001')">
                    Total National Earnings</a></li>
            <!--<li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    State and County Earnings</a></li>-->
        </ul></div>

    <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            Productivity
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick="AddButtonText(this.innerHTML, 'PRS84006092')">
                    Labor Productivity Change (%)</a></li>
            <!--<li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Multifactor Productivity</a></li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Industry Productivity</a></li>-->
        </ul></div>

    <!--<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            Workplace Injuries
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Fatal Occupational Injuries</a></li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Nonfatal Injuries</a></li>
            <li><a href="#" onclick=AddButtonText(this.innerHTML)>
                    Occupational Injuries and Illnesses</a></li>
        </ul></div>-->

    <div id="datedisplay"><script>document.write("This version is current as of: " + Date())</script></div>
</div>
</body>
</html>