@extends(Backend/Patient/MainTemplate)
@section(paymentmethodselected)
active
@endsection
@section(pagetitle)
Payment Method
@endsection
@section(stylelinks)

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- library validate -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
<!-- style css -->

<link rel="stylesheet" href="<?= base_url('assets/payment.css'); ?>">
@endsection
@section(content)
<div class="myrow">
    <div class="col-75">
        <div class="mycontainer">
            <form id="validate" action="/action_page.php">
                <div class="myrow">
                    <div class="col-50">
                        <h3>Contact Information</h3>
                        <input type="text" style="height:60px; border-radius:10px;"
                            placeholder="Email or Mobile Phone Number">
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Keep me up to date on news and
                            exclusive offers
                        </label><br>
                        <h3>Shipping Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="fullname" placeholder="Soeng.Souy" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="soeng.souy@gmail.com" required>
                        <label for="adr"><i class="fa fa-home"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="110 W. 15th Phnom Penh" required>
                        <!-- <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Phnom Penh" required> -->
                        <div class="myrow myclass">
                            <div class="col-50">
                                <label for="state">Company</label>
                                <input type="text" id="state" name="state" placeholder="Company (Optional)">
                            </div>
                            <div class="col-50">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" placeholder="Islamabad" required>
                            </div>
                        </div>
                        <div class="myrow myclass">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="Punjab" required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="12000" required>
                            </div>
                        </div>
                        <h3>Shipping Method</h3>
                        <div class="myrow">
                            <div class="col-50">
                                <table>
                                    <tr>
                                        <td><input type="radio" name="shippingradio" class="radio col-25"></td>
                                        <td>
                                            <h4 style="margin: 6px 0 0 10px;">Free Shipping</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="shippingradio" class="radio col-25"></td>
                                        <td>
                                            <h4 style="margin: 6px 0 0 10px;">Standard Shipping</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-50">
                                <div class="col-md-12">
                                    <div style="margin-left: 70px;">
                                        <h5>Free</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div style="margin-left: 70px;">
                                        <h5>$10.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment Method</h3>
                        <div class="form-group myclass">
                            <div class="myrow">
                                <div class="col-50">
                                    <table>
                                        <tr>
                                            <td><input type="radio" name="paymentradio" class="radio col-25"></td>
                                            <td>
                                                <h3 style="margin-top: 12px; margin-left: 10px;"><b>Credit Card</b></h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-50">
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:green;"></i>
                                        <i class="fa fa-cc-amex" style="color:navy;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>

                                    </div>

                                </div>

                                <div class="col-51">
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="Soeng Souy" required>
                                <label for="ccnum">Card number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"
                                    required>
                                </div>

                                <!-- <label for="expmonth">Exp Month</label>
                                    <input type="text" id="expmonth" name="expmonth" placeholder="September" required> -->
                                <div class="myrow">
                                    <div class="col-50">
                                        <label for="expyear">Expiration Date</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="(dd/mm/yyyy)"
                                            required>
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">Security Code</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="Your Code" required>
                                    </div>
                                </div>
                                <div class="col-50">
                                    <!-- <input type="radio" name="paymentradio" class="radio">
                                    <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png"
                                        alt="PayPal" /> -->
                                    <table>
                                        <tr>
                                            <td><input type="radio" name="paymentradio" class="radio"></td>
                                            <td><img style="margin: 8px 0 0 10px;" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png"
                                                    alt="PayPal" /></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-50">
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                </div>
                                <div class="col-50">
                                    <!-- <input type="radio" name="paymentradio" class="radio">
                                    <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png"
                                        alt="PayPal" /> -->
                                    <table style="margin-top: 10px;">
                                        <tr>
                                            <td><input type="radio" name="paymentradio" class="radio"></td>
                                            <td>
                                                <h3 style="margin: 8px 0 0 10px;">
                                                    <font color="gray">Money Order</font>
                                                </h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h3 style="margin-top: 170px;">Billing Address</h3>
                        <div class="myrow">
                            <div class="col-50">
                                <table>
                                    <tr>
                                        <td><input type="radio" name="shippingaddress" class="radio col-25"></td>
                                        <td>
                                            <h4 style="margin: 6px 0 0 10px;">Same as shippin address</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="shippingaddress" class="radio col-25"></td>
                                        <td>
                                            <h4 style="margin: 6px 0 0 10px;">Use a different billing address</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-25">
        <div class="mycontainer">
            <h4>ORDER SUMMARY</h4>
            <h4>
                <font color="green">Cart <span class="price" style="color:green"><i class="fa fa-shopping-cart"></i>
                        <b>4</b></span></font>
            </h4>
            <hr><br>
            <input type="text" placeholder="Coupon" style="border-radius:5px;"><br>
            <a href="">
                <font size="2">Apply Coupon</font>
            </a><br><br>
            <hr>
            <div class="myrow">
                <div class="col-50">
                    <table>
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5 style="margin-left: 150px;">$69.96</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5 style="margin-left: 150px;">...</h5>
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>

                <div class="col-50">
                    <table>
                        <tr>
                            <td>
                                <h2>Total</h2>
                            </td>
                            <td>
                                <h2 style="margin-left: 130px;">$69.95</h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- <p><a href="#">IPHONE 12 Pro Mac</a> <span class="price">$1500</span></p>
                <p><a href="#">SAMSUNG S21</a> <span class="price">$1500</span></p>
                <p><a href="#">OPPO F14</a> <span class="price">$1400</span></p>
                <p><a href="#">HUAWEI 20 Mac</a> <span class="price">$1200</span></p>
                <hr>
                <p>Total <span class="price" style="color:black"><b>$12600</b></span></p> -->
            <input type="submit" value="Continue to checkout" class="mybtn">
        </div>
    </div>
</div>
@endsection

@section(scriptlinks)

@endsection