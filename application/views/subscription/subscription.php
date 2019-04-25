<style>
    .box {
        width: 200px;
        height: 300px;
        position: relative;
        border: 1px solid #BBB;
        background: #eee;
        float: left;
        margin: 20px
    }

    .ribbon {
        position: absolute;
        /* right: -5px; */
        top: 3px;
        left: -17px;
        z-index: 1;
        overflow: hidden;
        width: 172px;
        height: 125px;
        text-align: right;
    }

    .ribbon span {
        font-size: 16px;
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        font-weight: bold;
        line-height: 29px;
        transform: rotate(-36deg);
        width: 150px;
        display: block;
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 18px;
        right: 23px;
    }

    .ribbon span::before {
        content: '';
        position: absolute;
        left: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid #79A70A;
        border-right: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .ribbon span::after {
        content: '';
        position: absolute;
        right: 0%;
        top: 100%;
        z-index: -1;
        border-right: 3px solid #79A70A;
        border-left: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .red span {
        background: linear-gradient(#F70505 0%, #8F0808 100%);
    }

    .red span::before {
        border-left-color: #8F0808;
        border-top-color: #8F0808;
    }

    .red span::after {
        border-right-color: #8F0808;
        border-top-color: #8F0808;
    }
</style>
<div id="plan">
    <div class="container">
        <div class="row">

            <div class="sub col-md-3 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="price-value">
                            <span class="amount">₦0</span>
                            <span class="month">monthly plan</span>
                        </div>
                    </div>
                    <div class="icon"><i class="fa fa-building-o"></i></div>
                    <div class="pricing-content">
                        <h3 class="title">Freemium</h3>
                        <ul>
                            <li>Unlimited Inspection Request Email Alert</li>
                            <li>5 Property/Design Listing or Published</li>
                            <li>Email Support</li>
                        </ul>
                        <a href="<?php $id = 1;
                                  echo site_url('login') ?>" class="pricingTable-signup">Sign up</a>

                    </div>
                </div>
            </div>
            <div class="sub col-md-3 col-sm-6">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <div class="price-value">
                            <span class="amount">₦5,000</span>
                            <span class="month">monthly plan</span>
                        </div>
                    </div>
                    <div class="icon"><i class="fa fa-building-o"></i></div>
                    <div class="pricing-content">
                        <h3 class="title">starter</h3>
                        <ul>
                            <li>Dedicated Webpage</li>
                            <li><strong>Unlimited</strong> Inspection Request Email Alert</li>
                            <li><strong>10</strong> Inspection Request SMS Alert </li>
                            <li><strong>10</strong> Property/Design Upload</li>
                            <li>Email Support</li>
                            <li>Access To Property Request Details</li>
                            <li>Access To Favorite Property Details</li>
                            <li>Access To Saved Property Alerts Details</li>
                        </ul>
                        <a href="<?php $id = 2;
                                  echo site_url('subscription/payment/' . $id) ?>" class="pricingTable-signup">Pay Online</a>
                        <br>
                        <a href="<?php $id = 2;
                                  echo site_url('subscription/bank_payment/' . $id) ?>" class='payment'> Pay by cash/Bank Transfer </a>

                    </div>
                </div>
            </div>
            <div class="sub col-md-3 col-sm-6">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <div class="price-value">
                            <span class="amount">₦7,500</span>
                            <span class="month">monthly plan</span>
                        </div>
                    </div>
                    <div class="icon"><i class="fa fa-building-o"></i></div>
                    <div class="pricing-content">
                        <h3 class="title">Standard</h3>
                        <ul>
                            <li>Dedicated Webpage</li>
                            <li>Sub Domain</li>
                            <li><strong>Unlimited</strong> Inspection Request Email Alert</li>
                            <li><strong>20</strong> Inspection Request SMS Alert </li>
                            <li><strong>30</strong> Property/Design Upload</li>
                            <li>Telephone Support</li>
                            <li>Email Support</li>
                            <li>Access To Property Request Details</li>
                            <li>Access To Favorite Property Details</li>
                            <li>Access To Saved Property Alerts Details</li>
                        </ul>
                        <a href="<?php $id = 3;
                                  echo site_url('subscription/payment/' . $id) ?>" class="pricingTable-signup">Pay Online</a>
                        <br>
                        <a href="<?php $id = 3;
                                  echo site_url('subscription/bank_payment/' . $id) ?>" class='payment'> Pay by cash/Bank Transfer </a>
                    </div>
                </div>
            </div>

            <div class="sub col-md-3 col-sm-6">
                <div class="ribbon red"><span>popular</span></div>
                <div class="pricingTable purple">

                    <div class="pricingTable-header">

                        <div class="price-value">
                            <span class="amount">₦10,000</span>
                            <span class="month">monthly plan</span>
                        </div>
                    </div>
                    <div class="icon"><i class="fa fa-building-o"></i></div>
                    <div class="pricing-content">
                        <h3 class="title">Premium</h3>
                        <ul>
                            <li>Dedicated Webpage</li>
                            <li>Sub Domain</li>
                            <li><strong>Unlimited</strong> Inspection Request Email Alert</li>
                            <li><strong>50</strong> Inspection Request SMS Alert </li>
                            <li><strong>50</strong> Property/Design Upload</li>
                            <li>Telephone Support</li>
                            <li>Email Support</li>
                            <li>Access To Property Request Details</li>
                            <li>Access To Favorite Property Details</li>
                            <li>Access To Saved Property Alerts Details</li>
                            <li><strong>2</strong> Promoted Ads (Facebook)</li>
                            <li>API for Integration</li>
                        </ul>
                        <a href="<?php $id = 4;
                                  echo site_url('subscription/payment/' . $id) ?>" class="pricingTable-signup">Pay Online</a>
                        <br>
                        <a href="<?php $id = 4;
                                  echo site_url('subscription/bank_payment/' . $id) ?>" class='payment'> Pay by cash/Bank Transfer </a>
                    </div>
                </div>
            </div>
            <div class="sub col-md-3 col-sm-6">
                <div class="pricingTable gold">
                    <div class="pricingTable-header">
                        <div class="price-value">
                            <span class="amount">₦20,000</span>
                            <span class="month">monthly plan</span>
                        </div>
                    </div>
                    <div class="icon"><i class="fa fa-building-o"></i></div>
                    <div class="pricing-content">
                        <h3 class="title">Ultimate</h3>
                        <ul>
                            <li>Dedicated Webpage</li>
                            <li>Sub Domain & Domain</li>
                            <li><strong>Unlimited</strong> Inspection Request Email Alert</li>
                            <li><strong>Unlimited</strong> Inspection Request SMS Alert </li>
                            <li><strong>Unlimited</strong> Property/Design Upload</li>
                            <li>Telephone Support</li>
                            <li>Email Support</li>
                            <li>Access To Property Request Details</li>
                            <li>Access To Favorite Property Details</li>
                            <li>Access To Saved Property Alerts Details</li>
                            <li><strong>5</strong> Promoted Ads (Facebook)</li>
                            <li>API for Integration</li>
                        </ul>
                        <a href="<?php $id = 5;
                                  echo site_url('subscription/payment/' . $id) ?>" class="pricingTable-signup">Pay Online</a>
                        <br>
                        <a href="<?php $id = 5;
                                  echo site_url('subscription/bank_payment/' . $id) ?>" class='payment'> Pay by cash/Bank Transfer </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id='payment-detail' class='container'>
    <div class='row'>
        <div class='col col-md-6'>

            <h3>Payment Via Bank Transfer</h3>
            <ul>
                <li>Select a price plan and the number of months you wish to pay for.</li>
                <li>Enter your Smart PropertyHub registered name or company name as a remark for the transfer using the account
                    details below.</li>
                <li>Follow the remaining steps.</li>
            </ul>
        </div>
        <div class='col col-md-6'>

            <h3>Cash Payment</h3>
            <ul>
                <li>Select a price plan and the number of months you wish to pay for.</li>
                <li>Pay the amount at any GTB branch using the account details below.</li>
                <li>Write your Smart PropertyHub registered name on the deposit slip.</li>
                <li>Mail a Scanned copy/picture of the deposit slip to sales@propertyhub.com.ng</li>
            </ul>
        </div>
        <div class='col col-md-6'>

            <h3>Paying Via Cheque</h3>
            <ul>
                <li>Select a price plan and the number of months you wish to pay for.</li>
                <li>Pay your cheque at any Zenith bank branch using the account details below.</li>
                <li>Write your Smart PropertyHub registered name on the deposit slip.</li>
                <li>Mail a Scanned copy/picture of the deposit slip to sales@propertyhub.com.ng</li>
            </ul>
        </div>
        <div class='col col-md-6'>

            <h3>Online Payment (Via ATM Card)</h3>
            <ul>
                <li>Click the "Pay Online" button on the plan of your choice above.</li>
                <li>Select the payment duration and then click "Pay Online".</li>
                <li>Follow the remaining steps.</li>
                <li>Note that you must be logged in first.</li>
            </ul>
        </div>

    </div>
</div>

<div id="bank-detail" class='well'>
    <h3>Our Bank Details</h3>
    <div class="row">
        <div class='col-md-6'>
            <img style='width: 50px;' src="https://thenetwork-group.com/assets/files/sites/4/2016/06/GTBank-plc-Logo-.jpg" alt="Guarantee Trust Bank">
            <h5>Guarantee Trust Bank</h5>
            <p><strong>Acct. Name:  Smart PropertyHub Ltd</strong> </p>
            <p><strong>Acct. Number:  0174536195</strong> </p>
        </div>
        <div class='col-md-6'>
            <img style='width: 50px; height: 50px;' src="http://africanleadership.co.uk/wp-content/uploads/2018/09/ghu.jpg" alt="Guarantee Trust Bank">
            <h5>UBA</h5>
            <p><strong>Acct. Name:  Smart PropertyHub Ltd</strong> </p>
            <p><strong>Acct. Number:  1019118010</strong> </p>
        </div>
    </div>
</div> 