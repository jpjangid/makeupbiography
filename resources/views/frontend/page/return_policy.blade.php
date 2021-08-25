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
            <h1 style="text-align:center; font-weight: bold; font-size: 25px;">RETURN POLICY</h1>
            <br>
        <p>
            Returns is a scheme provided by seller directly under this policy in terms of which the option of exchange,
            replacement and/or refund is offered by the seller to you.
            <br>
            <br>
            <strong style="font-size: 20px;">Cancellation before shipment (Only valid on orders’ place & delivery in India):</strong>
            <br>
            If the order or the item(s) that you want to cancel have not been shipped yet, you can write to our customer support team on pqr@xyz.com or call us on 1800-XXX-XXXX (Monday to Friday, 10AM - 6PM).
            <br>
            In such cases, the order will be cancelled, and the money will be refunded to you within 24 - 48 business hours after the cancellation request is duly processed by us.
            <br>
            <br>
            <strong  style="font-size: 20px;">How will I get refunded for the cancelled orders and how long will this process take?</strong>
            <br>
            In case of cancellation before shipment, we process the refund within 24 - 48 business hours after receiving the cancellation request.
            <br>
            In case of cancellation once the shipment has already been dispatched or if it is being returned, we process the refund once the products have been received and verified at our warehouse.
            <br>
            <ul>
                <li>
                    For <b>payments done through credit/debit cards or net banking</b>, the refund will be processed to the same account from which the payment was made within 24-48 business hours of us receiving the products back. 
                    It may take 2 - 3 additional business days for the amount to reflect in your account.
                </li>
                <li>
                    For <b>cash on delivery transactions</b>, we will initiate a bank transfer against the refund amount against the billing details shared by you. This process will be completed within 24-48 business hours of us receiving the products back and your bank details on email. 
                    It will take an additional 2 - 3 business days for the amount to reflect in your account.
                </li>
            </ul>
            <br>
            <strong  style="font-size: 20px;">
                How do I return an item purchased on Makeup Biography?</strong>
                <br>
                <b>Indian Orders:</b>
            <br>
            We offer our customers an ’Easy return policy’, wherein you can raise a return/exchange request of a product within 7 days of its delivery. 
            We also accept partial returns wherein you can raise a return request for one or all products in you order.
            <br>
            <b>Step 1:</b> Contact our Customer Support team via email (pqr@xyz.com) within 5 business days of receiving the order.
            <br>
            <b>Step 2:</b> Provide us with your order ID details and your request to return/replace/refund your order. 
                           Kindly email an image of the product and the invoice for our reference.
            <br>
            <b>Step 3:</b> We will pick up the products within 2-4 business days. We will initiate the refund or replacement process only if the products are received by us in their original packaging with their seals, labels and barcodes intact.
            <br>
            <br>
            <b>
                International Orders:
            </b>
            <br>
            Products can only be eligible for returns if the products received by the customer are deemed to have been received in a damaged / defective state or are expired or an incorrect product has been delivered. Such products can only be returned in their original packaging, in an unused and sealed condition.
            [Opened or used products will not be accepted as returns.]
            <br>
            <br>
            If a return is accepted, company will replace or refund the invoiced rupee value for, the damaged / defective / expired / wrong product. 
            In either case, the additional customs amount paid by the customer to receive the product will be reimbursed to the customer in the form of a refund coupon, that can be applied to the customer’s next order with us, subject to the customer providing a copy of the customs receipt.
            <br>
            <br>
            <b>Note:</b> If it is a case of replacement, it is subject to the availability of stock. In cases when a replacement may not be available, we will refund you the full amount. Kindly refer to the next question for exclusions to refunds.
            <br>
            <br>
            <strong  style="font-size: 20px;">Returns Pick-Up and Processing</strong>
            <br>
            In case of returns where you would like item(s) to be picked up from a different address, the address can only be changed if pick-up service is available at the new address.
            <br>
            During pick-up, your product will be checked for the following conditions:
            <br>
            <table >
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Conditions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Correct Product</td>
                        <td>
                            IMEI/ name/ image/ brand/ serial number/ article number/ bar code should match and 
                            MRP tag should be undetached and clearly visible.
                        </td>
                    </tr>
                    <tr>
                        <td>Complete Product</td>
                        <td>
                            All in-the-box accessories, freebies and combos (if any) should be present.
                        </td>
                    </tr>
                    <tr>
                        <td>Unused Product</td>
                        <td>
                            The product should be unused, unwashed, unsoiled, without any stains and with non-tampered quality check seals/return tags/warranty seals (wherever applicable).
                        </td>
                    </tr>
                    <tr>
                        <td>Undamaged Product</td>
                        <td>
                            The product should be undamaged and without any scratches or holes.
                        </td>
                    </tr>
                    <tr>
                        <td>Undamaged Packaging</td>
                        <td>
                            Product's original packaging/ box should be undamaged.
                        </td>
                    </tr>
                </tbody>
            </table>
            The field executive will refuse to accept the return if any of the above conditions are not met.
            <br>
            For any products for which a refund is to be given, the refund will be processed once the returned product has been received by the seller.
            <br>
            <br>
            <strong style="font-size: 20px;">
                Do I have to return the free gift when I return a product?
            </strong>
            <br>
            Yes, the free gift is included as a part of the item order and needs to be returned along with the originally delivered product.
            <br>
            <br>
            <strong style="font-size: 20px;">
                Can I return part of my order?
            </strong>
            <br>
            Yes. A return can be created at item level and if you have ordered multiple items, you can initiate a return/replacement/refund for any individual item. 
            However, any product being returned needs to be returned in full including all components as well as any complimentary gifts or products which came along with it.
        </p>
        </div>
        </div>
    </div>
</div>
@endsection