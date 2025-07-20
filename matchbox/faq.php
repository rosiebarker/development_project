<?php
//Starts the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ - Buy and Sell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<body>

    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

            <div class="card orange-shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">

                        <h1 class="mb-4 text-center">Frequently Asked Questions</h1>

                        <div class="accordion" id="faqAccordion">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingone">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                                        How do I create an account?
                                    </button>
                                </h2>
                                <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Click on the "Sign Up" or "Register" button located at the top of the page on our website.
                                    Fill out the required information such as your name, email address, and a secure password.
                                    Once you've completed the form, click "Submit" or "Create Account."
                                    You may receive a confirmation email to verify your email address. Follow the instructions in the email to complete the registration process.
                                    Congratulations! You're now a member of our community. You can log in anytime using your registered email and password.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingthree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
                                        What payment methods are accepted?
                                    </button>
                                </h2>
                                <div id="collapsethree" class="accordion-collapse collapse" aria-labelledby="headingthree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    We offer a variety of secure payment options to make your shopping experience convenient:
                                    Credit or Debit Cards: We accept major credit and debit cards including Visa, Mastercard, American Express, and Discover.
                                    PayPal: You can use your PayPal account to make purchases on our website.
                                    Bank Transfer: For certain orders, we may also accept direct bank transfers. Please contact our customer support team for more information.
                                    Rest assured, we utilize industry-standard encryption and security protocols to ensure that your payment information is always safe and secure.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingfour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        What is your refund policy?
                                    </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    We want you to be completely satisfied with your purchase. If for any reason you're not happy with your order, we offer a straightforward refund policy:
                                    Eligibility: To be eligible for a refund, the item must be unused, in its original packaging, and returned within [number of days] days of purchase.
                                    Refund Process: Simply contact our customer support team with your order details and reason for the return. Once your return is approved, you'll receive instructions on how to send the item back to us.
                                    Refund Timeframe: Refunds are typically processed within [number of days] days of receiving the returned item. Please note that it may take additional time for the refund to reflect in your account depending on your payment method and financial institution.
                                    Exceptions: Certain items such as personalized or custom-made products may not be eligible for refunds. Please refer to our Terms and Conditions for more details.
                                    Our goal is to ensure a seamless shopping experience for our customers, and we're here to assist you every step of the way. If you have any questions or concerns regarding refunds or returns, please don't hesitate to reach out to our friendly customer support team.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php include 'includes/footer.php' ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!-- collapse table -->
    

</body>

</html>