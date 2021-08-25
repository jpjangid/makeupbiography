@extends('frontend.layouts.app')

@section('css')
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    } 
    th, td {
        padding: 10px;
    }
</style>
@endsection

@section('content')
<div class="c-ip-accordion__item c-ip-accordion__item--layout-1" style="padding: 30px; margin: 30px 50px 30px 50px;">
    <div class="container" style="font-family: 'Times New Roman', Times, serif; text-align: justify;">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <h1 style="text-align:center; font-weight: bold; font-size: 25px;">SHIPPING POLICY</h1>
                <br>
                <p>
                    <strong style="font-size: 20px;">How does the delivery process work?</strong>
                    <br>
                    Once our system processes your order, your products are inspected thoroughly to ensure they are in a perfect condition.<br>
                    Once they pass through the final round of quality check, they are packed and handed over to our trusted delivery partner.<br>
                    Our delivery partners then bring the package to you at the earliest. In case, they are unable to reach your provided address or at a suitable time, they will contact you to resolve the issue.
                    <br><br>
                    <strong style="font-size: 20px;">What is the estimated delivery time?</strong>
                    <br>
                    We dispatch most orders within 5-4 business days (i.e. excluding Sundays and public holidays).
                    <ul>
                        <li>Though, we keep 95% of our catalogue in our inventory, certain products need to be sourced directly from the brand itself so that we can live up to our promise of providing fresh, non-expired products.</li>
                        <li>While we are trying our best to avoid this situation, these products might delay your order.</li>
                        <li>If you are ordering our products from a Mega Sale event, dispatches may be a bit delayed due to increased volumes. We will target to dispatch all orders within 5 days of order date.</li>
                    </ul>
                    We are pleased to say, more than 95% of Makeup Biography orders are delivered within 3-5 business days from the date of order.
                    <br>
                    <br>
                    <strong style="font-size: 20px;">General Shipping Policy</strong>
                    <br>
                    We can't deliver orders to PO box numbers. If there's no physical address to deliver your order, you can
                    select a pick-up store in your vicinity to complete the order. To learn more about pick-up stores, please
                    visit Pickup Stores. If pickup stores aren't available in your area, you can ship your order to a
                    relative/acquaintance/hotel address and collect it from there.
                    <br><br>
                    <strong style="font-size: 20px;">Shipping Speed And Charges</strong>
                    <br>
                    We display shipping speeds and charges based on the items in your cart and the delivery address.
                    <br><br>
                    <strong style="font-size: 20px;">Scheduled Delivery</strong>
                    <br>
                    You may choose any 2 hour delivery slot between 08 am and 10 pm, on the same day or next day, provided the
                    same should not qualify as an Express Delivery, in which case your order will be construed as 'Express
                    Delivery' instead of 'Scheduled Delivery' and be charged accordingly.
                    <br><br>
                    <strong style="font-size: 20px;">Fulfilled by Makeup Biography</strong>
                    <br>
                    For certain products sold on Makeup Biography, the customer will have an option of Guaranteed Morning,
                    Same-Day, One/Two-Day Delivery. The Guaranteed Delivery options are available on Prime Eligible items in select cities. The details of Guaranteed
                    Shipping Speeds and Delivery Charges are available here.
                    <br>
                    These charges apply only Makeup Biography items:-
                    <br>
                    <table>
                        <tr>
                            <th>Shipping Speed</th>
                            <th>Charges Per Item
                                Reg. Members </th>
                            <th>Charges Per Item
                                Non Reg. Members
                            </th>
                        </tr>
                        <tr>
                            <td>Same-Day-Delivery*</td>
                            <td>Free</td>
                            <td>₹100</td>
                        </tr>
                        <tr>
                            <td>Morning-Delivery*</td>
                            <td>₹50</td>
                            <td>₹100</td>
                        </tr>
                        <tr>
                            <td>One-Day-Delivery*</td>
                            <td>Free</td>
                            <td>₹150</td>
                        </tr>
                        <tr>
                            <td>Two-Day-Delivery*</td>
                            <td>Free</td>
                            <td>₹80</td>
                        </tr>
                        <tr>
                            <td>No-Rush-Delivery*</td>
                            <td>Free</td>
                            <td>N.A</td>
                        </tr>
                        <tr>
                            <td>Standard-Delivery*</td>
                            <td>Free</td>
                            <td>₹100</td>
                        </tr>
                    </table>
                    <ol>
                        <li>You can only choose Morning delivery and Same-Day delivery for residential addresses.</li>
                        <li>We deliver by 11 am for Morning delivery and by 10 pm for Same-Day delivery.</li>
                        <li>We deliver orders placed with Standard Delivery in two or more days after they ship. You see the estimated
                            delivery date before you place the order.</li>
                        <li>The applicable delivery charge will be levied even for multiple quantities of the same product. The ship
                            fee per item structure is limited to standard and fast track speeds for Prime and non-Prime customers mentioned
                            in the above table.</li>
                    </ol>
                    <br>
                    <b>*In addition to the above, Cash On Delivery (COD) may not be available for certain items and pincodes.
                    Please check for COD availability at the time of checkout.*</b>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection