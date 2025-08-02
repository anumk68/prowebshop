@extends('frontend.layout.app')
@section('content')
    <section class="banner_about_us py_8"
        style="background-image: url({{asset('public/frontend/img/refund_policy.webp')}});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h1>Refund Policy</h1>
                    <p>At ProWebShop.online, customer satisfaction is our priority. Please review our refund and return
                        policy below:
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="privacy_policy py_8">
        <div class="container">
            <div class="content">
                <div>
                    <h4>Returns</h4>
                    <p>
                    <ul>
                        <li>
                            If you are not satisfied with your purchase, you can request a return within 15 days of the
                            product delivery date.
                        </li>
                        <li>
                            Items must be returned in their original condition, unused and with all original packaging and
                            tags.
                        </li>
                    </ul>
                    </p>
                </div>
                <div>
                    <h4>Refunds</h4>
                    <p>
                    <ul>
                        <li>
                            Once your return is received and inspected, we will notify you about the approval or rejection
                            of your refund.
                        </li>
                        <li>
                            Approved refunds will be processed to your original payment method within 7-14 business days.
                        </li>
                        <li>
                            Shipping charges are non-refundable unless there is a proven defect or error on our part.
                        </li>
                    </ul>
                    </p>
                </div>
                <div>
                    <h4>Non-Returnable Items</h4>
                    <p>
                    <ul>
                        <li>
                            Certain products (like digital downloads, perishable goods, or customized items) are not
                            eligible for return or refund unless faulty.
                        </li>
                        <li>
                            Sale or clearance items are final sale unless they arrive damaged or defective.
                        </li>
                    </ul>
                    </p>
                </div>
                <div>
                    <h4>How to Request a Refund</h4>
                    <ul>
                        <li>
                            Contact our customer support at  <a
                            href="mailto:contact@prowebshop.online" class="privacy_mail">info@prowebshop.online</a> with your order number and reason for return.
                        </li>
                        <li>
                            We will provide you with return instructions and a return address.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
@endsection